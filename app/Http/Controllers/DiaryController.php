<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\DiaryStoreRequest;
use App\Http\Requests\DiaryUpdateRequest;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $diaries = Diary::query()->where('user_id', $id)->orderBy('created_at', 'desc')->paginate(10);
        return view('diary.index', compact('diaries'));
    }

    public function detail($uuid)
    {
        if (!Auth::check()) {
            redirect(route('index'));
        }
        $user_id = Auth::id();
        $diary = Diary::query()->where('user_id', $user_id)->where('uuid', $uuid)->first();

        if ($diary === null) {
            return redirect('diary')->withErrors('エラーが発生しました。');
        }

        $importance_emoji = Diary::DIARY_STATUS_OBJECT[$diary->importance];
        return view('diary.detail', compact('diary', 'importance_emoji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiaryStoreRequest $request)
    {
        $user_id = Auth::id();
        try {
            Diary::create([
                'user_id' => $user_id,
                'uuid' => str()->uuid(),
                'importance' => $request->importance,
                'date' => $request->date,
                'time' => $request->time,
                'feeling' => $request->feeling,
                'elapsed_time' => $request->elapsed_time,
                'coping_measures' => $request->coping_measures,
            ]);
            return redirect('diary')->with('status', '記録を作成しました。');
        } catch (\Exception $ex) {
            logger($ex->getMessage());
            return redirect('diary')->withErrors($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function show(Diary $diary)
    {
        //
    }

    public function edit($uuid)
    {
        $user_id = Auth::id();
        $diary = Diary::where('user_id', $user_id)->where('uuid', $uuid)->first();
        if ($diary === null) {
            return redirect('diary')->withErrors('エラーが発生しました。');
        }

        return view('diary.edit', ['diary' => $diary]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function update(DiaryUpdateRequest $request, Diary $diary)
    {
        $user_id = Auth::id();
        try {
            DB::beginTransaction();
            $diary = Diary::where('user_id', $user_id)->where('uuid', $request->input('uuid'))->first();
            $diary->importance = $request->input('importance');
            $diary->date = $request->input('date');
            $diary->time = $request->input('time');
            $diary->elapsed_time = $request->input('elapsed_time');
            $diary->feeling = $request->input('feeling');
            $diary->coping_measures = $request->input('coping_measures');
            $diary->save();
            DB::commit();
            return redirect('diary')->with('status', '記録を更新しました。');
        } catch (\Exception $ex) {
            DB::rollback();
            logger($ex->getMessage());
            return redirect('diary')->withErrors($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Diary::find($id)->delete();
            return redirect('diary')->with('status', '記録を削除しました。');
        } catch (\Exception $ex) {
            logger($ex->getMessage());
            return redirect('diary')->withErrors($ex->getMessage());
        }
    }
}
