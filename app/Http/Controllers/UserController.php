<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            DB::commit();
            return redirect(route('user.my_page'))->with('status', '記録を更新しました。');
        } catch (\Exception $ex) {
            DB::rollback();
            logger($ex->getMessage());
            return redirect(route('user.my_page'))->withErrors($ex->getMessage());
        }
    }
}
