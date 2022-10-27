<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('user.my_page');
    }

    public function edit()
    {
        return view('user.edit');
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $user->name = $request->name;
            if (Auth::user()->email !== $request->email) {
                $user->email = $request->email;
            }
            if (isset($request->password)) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            DB::commit();
            return redirect(route('user.my_page'))->with('status', '記録を更新しました。');
        } catch (\Exception $ex) {
            DB::rollback();
            logger($ex->getMessage());
            return redirect(route('user.my_page'))->withErrors($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            if (Auth::id() !== (int)$id) {
                throw new \Exception("ログインユーザーではありません。ログインユーザーid:" . Auth::id() . ' 入力IDは' . $id);
                return redirect('/');
            }

            User::findOrFail($id)->delete();
            return redirect('/');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect('/user/my_page')->withErrors('エラーが発生しました。もう一度やり直してください');
        }
    }
}
