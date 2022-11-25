<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Hash;

class GuestController extends BaseController
{
    public function forgetPassword()
    {
        return view('/Auth/forget-password');
    }

    public function forgetPasswordSave(Request $request)
    {
        $data = $request->validate([
            'nip' => ['required', 'numeric', 'digits_between:4,20'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $checkUser = app('App\Http\Controllers\HomeController')->checkValidation($request->nip, $request->email);
        if($checkUser) {
            $data['user_id'] = $checkUser->id;
            $data['password'] = Hash::make($request->password);
            $data['opd_id'] = $checkUser->opd_id;
            $data['name'] = $checkUser->name;
            $data['status'] = 'Lupa Password';
            app('App\Http\Controllers\HomeController')->userForgetPassword($data);
            return redirect(route('login'));
        }
        return back()->withErrors('User Tidak Terdaftar');
    }
}
