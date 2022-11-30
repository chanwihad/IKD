<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\ModelHasUser;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'opd_id' => ['required'],
            'status' => ['required'],
            'nip' => ['required', 'numeric', 'digits_between:18,20'],
            'jabatan' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (ModelHasUser::getVerifiedById($data['nip'])) {
            return null;
        }
        $nip = $data['nip'];
        $data =  User::create([
            'name' => $data['name'],
            'nip' => NULL,
            'email' => $data['email'],
            'opd_id' => $data['opd_id'],
            'password' => Hash::make($data['password']),
            "jabatan" => $data['jabatan'],
            "status" => $data['status'],
        ]);
        ModelHasUser::create([
            'name' => $data['name'],
            'nip' => $nip,
            'user_id' => $data->id,
            'opd_id' => $data['opd_id'],
            'role' => $data['status'],
            'status' => 'Registrasi',
        ]);
        return $data;
    }
}
