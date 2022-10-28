<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;

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

    public function edit_select()
    {
        return view('user.edit-select');
    }

    public function edit_name()
    {
        return view('user.edit-name');
    }

    public function update_name(Request $request, $id)
    {
        if (Auth::id() !== (int)$id) {
            return redirect(route('user.edit_name'))->withErrors('もう一度やり直してください。');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect(route('user.edit_name'))
                        ->withErrors($validator)
                        ->withInput();
        }

        // バリデーション済みデータの取得
        $validated = $validator->validated();

        $user = User::find($id);
        $user->name = $validated['name'];
        $user->save();
        return redirect(route('user.edit_name'))->with('status', '名前を更新しました。');
        ;
    }

    public function edit_email()
    {
        return view('user.edit-email');
    }

    public function update_email(Request $request, $id)
    {
        // https://zakkuri.life/laravel-send-verify-email/

        if (Auth::id() !== (int)$id) {
            return redirect(route('user.edit_email'))->withErrors('もう一度やり直してください。');
        }

        $validator = Validator::make($request->all(), [
            'email' => ['confirmed', 'required', 'unique:users'],
        ]);

        if ($validator->fails()) {
            return redirect(route('user.edit_email'))
                        ->withErrors($validator)
                        ->withInput();
        }

        // バリデーション済みデータの取得
        $validated = $validator->validated();
        $user = User::find($id);
        $user->email = $validated['email'];
        $user->email_verified_at = null;
        $user->save();
        event(new Registered($user));

        return redirect(route('user.my_page'))->with('status', 'メールアドレスを更新しました。');
    }


    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        try {
            DB::beginTransaction();
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
