<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Indikator;
use App\Models\IndikatorDetail;
use App\Models\ModelHasUser;
use App\Models\User;

class AdminController extends Controller
{
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

    // --------------------- INDIKATOR -------------------- // 

    public function indicatorList()
    {
        $this->authorize('administrator', User::class);
        if ($this->user->isAdministrator()) {
            $data = Indikator::getAllIndikatorList();
            return view('/indikator/list', ['data' => $data, 'user' => $this->user]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    // --------------------- INDIKATOR DETAIL -------------------- // 

    public function indicatorDetailAllList()
    {
        $this->authorize('administrator', User::class);
        if ($this->user->isAdministrator()) {
            $data = IndikatorDetail::getAllIndikatorDetail();
            $verified = IndikatorDetail::getAllIndikatorDetailVerified();
            $unverified = IndikatorDetail::getAllIndikatorDetailNotVerified();
            return view('/indikator-detail/list-all', ['data' => $data, 'user' => $this->user, 'verified' => $verified, 'unverified' => $unverified]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function indicatorDetailList($id)
    {
        $this->authorize('administrator', User::class);
        if ($this->user->isAdministrator()) {
            $data = IndikatorDetail::getIndikatorDetailList($id);
            return view('/indikator-detail/list', ['data' => $data, 'user' => $this->user]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    // --------------------- USER REGIS -------------------- // 

    public function userList()
    {
        $this->authorize('administrator', User::class);
        if ($this->user->isAdministrator()) {
            $data = User::getUser();
            return view('/admin/user-list', ['data' => $data, 'user' => $this->user]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function userStatusUpdate($id)
    {
        $this->authorize('administrator', User::class);
        if ($this->user->isAdministrator()) {
            $user = User::getUserById($id);
            $user->removeRole($user->status);
            ModelHasUser::userUpdateStatus($user);
            User::userStatusUpdate($id);
            return back()->with('success', 'Berhasil Mengubah Status User');
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function userRegisDetailUpdate($id)
    {
        $this->authorize('administrator', User::class);
        if ($this->user->isAdministrator()) {
            $regis = ModelHasUser::getUserById($id);
            if ($regis) {
                $data = User::where('id', $regis->user_id)->update([
                    'name' => $regis->name,
                    'opd_id' => $regis->opd_id,
                    'nama_opd' => $regis->opd->name,
                    'nip' => $regis->nip,
                    'status' => $regis->role,
                ]);
                if ($data == 1) {
                    $asrole = User::getUserById($regis->user_id);
                    $asrole->assignRole($regis->role);
                    // ModelHasUser::modelHasUserDelete($id);
                    ModelHasUser::userRegisSuccess($id);
                    return back()->with('success', 'Berhasil validasi data user baru');
                }
                return back()->with('warning', 'Gagal validasi data user baru');
            }
            return back()->with('warning', 'Data tidak ditemukan');
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function userDelete($id)
    {
        $this->authorize('administrator', User::class);
        if ($this->user->isAdministrator()) {
            User::userDelete($id);
            return back()->with('success', 'Berhasil Menghapus User');
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    // --------------------- USER VALIDATION -------------------- // 

    public function userValidationList()
    {
        $this->authorize('administrator', User::class);
        if ($this->user->isAdministrator()) {
            $data = ModelHasUser::getUserList();
            $regis = ModelHasUser::getUserRegistration();
            $pass = ModelHasUser::getUserForgetPassword();
            return view('/admin/user-validation-list', ['data' => $data, 'user' => $this->user, 'regis' => $regis, 'pass' => $pass]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function userValidationDelete($id)
    {
        $this->authorize('administrator', User::class);
        if ($this->user->isAdministrator()) {
            ModelHasUser::userDeleteById($id);
            return back()->with('success', 'Berhasil menghapus data');
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function userForgetPasswordUpdate($id)
    {
        $this->authorize('administrator', User::class);
        if ($this->user->isAdministrator()) {
            $pass = ModelHasUser::getUserById($id);
            if ($pass) {
                $data = User::where('id', $pass->user_id)->update([
                    'password' => $pass->password,
                ]);
                if ($data == 1) {
                    ModelHasUser::userPassSuccess($id);
                    return back()->with('success', 'Berhasil validasi password user baru');
                }
                return back()->with('warning', 'Gagal validasi password user baru');
            }
            return back()->with('warning', 'Data tidak ditemukan');
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }
}
