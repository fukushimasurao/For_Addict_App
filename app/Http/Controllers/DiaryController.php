<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        $id = Auth::id();
        $diaries = Diary::where('user_id', $id)->paginate(10);
        return view('diary.index', ['diaries' => $diaries]);
    }

    public function detail($id)
    {
        if (!Auth::check()) {
            redirect(route('index'));
        }

        $user_id = Auth::id();
        $diary = Diary::where('user_id', $user_id)->find($id);
        return view('diary.detail', ['diary' => $diary]);
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
    public function store(Request $request)
    {
        $user_id = Auth::id();
        try {
            Diary::create([
                'user_id' => $user_id,
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

    public function edit($id)
    {
        $diary = Diary::find($id);
        return view('diary.edit', ['diary' => $diary]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diary $diary)
    {
        try {
            DB::beginTransaction();
            $diary = Diary::find($request->input('id'));
            $diary->date = $request->input('date');
            $diary->time = $request->input('time');
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
