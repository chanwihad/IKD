<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Opd;
use App\Models\User;
use App\Models\ModelHasUser;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        // \Auth::User()->assignRole('admin');
        // dd('berhasil');
        if ($this->user) {
            $jumlah = Indikator::getJumlahByOpd();
            $jumlah_opd = 0;
            foreach ($jumlah as $data) {
                $jumlah_opd += $data->jumlah;
            }
            $total = Indikator::getJumlah();
            $total_opd = 0;
            foreach ($total as $datas) {
                $total_opd += $datas->jumlah;
            }
            if ($total_opd != 0) {
                $persen = $jumlah_opd * 100 / $total_opd;
            } else {
                $persen = 0;
            }
            $opd = Opd::getNameByOpd();
            return view('/dashboard', ['user' => $this->user, 'jumlah' => $jumlah_opd, 'total' => $total_opd, 'persen' => number_format($persen), 'opd' => $opd]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function checkValidation($nip, $email)
    {
        return User::getUserByNipEmail($nip, $email);
    }

    public function userForgetPassword($data)
    {
        ModelHasUser::create($data);
    }
}
