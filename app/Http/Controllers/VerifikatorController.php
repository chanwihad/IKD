<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Indikator;
use App\Models\IndikatorDetail;
use App\Models\Opd;
use App\Models\User;

class VerifikatorController extends Controller
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
        $this->authorize('verify indikator', User::class);
        if ($this->user->isVerifikator()) {
            $data = Indikator::getIndikatorList();
            return view('/indikator/list', ['data' => $data, 'user' => $this->user,]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    // --------------------- INDIKATOR DETAIL -------------------- // 

    public function indicatorDetailList($id)
    {
        $this->authorize('verify indikator', User::class);
        if ($this->user->isVerifikator()) {
            $data = IndikatorDetail::getIndikatorDetailList($id);
            return view('/indikator-detail/list', ['data' => $data, 'user' => $this->user]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function indicatorDetailUpdate($id)
    {
        $this->authorize('verify indikator', User::class);
        if ($this->user->isVerifikator()) {
            $indikator = Indikator::getIndikator();
            $data = IndikatorDetail::getIndikatorDetailById($id);
            return view('/indikator-detail/update', ['data' => $data, 'user' => $this->user, 'indikator' => $indikator]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function indicatorDetailSave(Request $request)
    {
        $this->authorize('verify indikator', User::class);
        if ($this->user->isVerifikator()) {
            if ($request->verifikasi == 1) {
                $data = $request->validate([
                    'verifikasi' => 'required',
                ]);
                $data['catatan'] = null;
            } else if($request->verifikasi == 0) {
                $data = $request->validate([
                    'verifikasi' => 'required',
                    'catatan' => 'required',
                ]);
            }
            $indikator_detail = IndikatorDetail::indikatorDetailSaveUpdate($data, $request->id);
            if ($indikator_detail) {
                return redirect(route('verifikatorIndicatorDetailList', $request->indikator_id))->with('success', 'Berhasil memperbarui data indikator');
            }
            return redirect(route('verifikatorIndicatorDetailList', $request->indikator_id))->with('warning', 'Gagal memperbarui data indikator');
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }
}
