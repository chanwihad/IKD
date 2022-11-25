<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Indikator;
use App\Models\IndikatorDetail;
use App\Models\User;

class ProdusenDataController extends Controller
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
        $this->authorize('manage indikator', User::class);
        if ($this->user->isProdusenData()) {
            $data = Indikator::getIndikatorList();
            return view('/indikator/list', ['data' => $data, 'user' => $this->user]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function indicatorCreate()
    {
        $this->authorize('manage indikator', User::class);
        if ($this->user->isProdusenData()) {
            return view('/indikator/create', ['user' => $this->user]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function indicatorUpdate($id)
    {
        $this->authorize('manage indikator', User::class);
        if ($this->user->isProdusenData()) {
            $data = Indikator::getIndikatorById($id);
            return view('/indikator/update', ['data' => $data, 'user' => $this->user]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function indicatorSave(Request $request)
    {
        $this->authorize('manage indikator', User::class);
        if ($this->user->isProdusenData()) {
            $data = $request->validate([
                'name' => 'required',
            ]);
            if ($request->get('id') == null) {
                $data['id'] = \Str::uuid();
                $data['opd_id'] = $this->user->opd_id;
            }
            if ($request->get('id') == null) {
                $indikator = Indikator::indikatorSaveCreate($data);
                if($indikator){
                    return redirect(route('produsenDataIndicatorList'))->with('success', 'Berhasil menyimpan data indikator baru');
                }
                return redirect(route('produsenDataIndicatorList'))->with('warning', 'Gagal menyimpan data indikator baru');
            } else {
                $indikator = Indikator::indikatorSaveUpdate($data, $request->id);
                if($indikator){
                    return redirect(route('produsenDataIndicatorList'))->with('success', 'Berhasil memperbarui data indikator');
                }
                return redirect(route('produsenDataIndicatorList'))->with('warning', 'Gagal memperbarui data indikator');
            }
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function indicatorDelete($id)
    {
        $this->authorize('manage indikator', User::class);
        if ($this->user->isProdusenData()) {
            $data = Indikator::indikatorDelete($id);
            return back()->with('success', 'berhasil menghapus indikator');
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    // --------------------- INDIKATOR DETAIL -------------------- // 

    public function indicatorDetailList($id)
    {
        $this->authorize('manage indikator', User::class);
        if ($this->user->isProdusenData()) {
            $data = IndikatorDetail::getIndikatorDetailList($id);
            // dd($data);
            return view('/indikator-detail/list', ['data' => $data, 'user' => $this->user]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function indicatorDetailCreate()
    {
        $this->authorize('manage indikator', User::class);
        if ($this->user->isProdusenData()) {
            $indikator = Indikator::getIndikator();
            return view('/indikator-detail/create', ['data' => $indikator, 'user' => $this->user]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function indicatorDetailUpdate($id)
    {
        $this->authorize('manage indikator', User::class);
        if ($this->user->isProdusenData()) {
            $indikator = Indikator::getIndikator();
            $data = IndikatorDetail::getIndikatorDetailById($id);
            return view('/indikator-detail/update', ['data' => $data, 'user' => $this->user, 'indikator' => $indikator]);
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function indicatorDetailSave(Request $request)
    {
        $this->authorize('manage indikator', User::class);
        if ($this->user->isProdusenData()) {
            $data = $request->validate([
                'indikator_id' => 'required',
                'nilai' => 'required',
                'satuan' => 'required',
                'tahun' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
                'target' => 'required',
                'capaian' => 'required',
                'publish' => 'required',
                'status' => 'required',
            ]);
            if ($request->get('id') == null) {
                $data['id'] = \Str::uuid();
            }
            $data['verifikasi'] = 0;
            $data['validasi'] = 0;
            if ($request->get('id') == null) {
                $indikator_detail = IndikatorDetail::indikatorDetailSaveCreate($data);
                if($indikator_detail){
                    return redirect(route('produsenDataIndicatorDetailList', $request->indikator_id))->with('success', 'Berhasil menyimpan data indikator baru');
                }
                return redirect(route('produsenDataIndicatorDetailList', $request->indikator_id))->with('warning', 'Gagal menyimpan data indikator baru');
            } else {
                $indikator_detail = IndikatorDetail::indikatorDetailSaveUpdate($data, $request->id);
                if($indikator_detail){
                    return redirect(route('produsenDataIndicatorDetailList', $request->indikator_id))->with('success', 'Berhasil memperbarui data indikator');
                }
                return redirect(route('produsenDataIndicatorDetailList', $request->indikator_id))->with('warning', 'Gagal memperbarui data indikator');
            }
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }

    public function indicatorDetailDelete($id)
    {
        $this->authorize('manage indikator', User::class);
        if ($this->user->isProdusenData()) {
            $data = IndikatorDetail::indikatorDetailDelete($id);
            return back()->with('success', 'berhasil menghapus data indikator');
        }
        return abort(403, "Silahkan Login Terlebih Dahulu");
    }
}
