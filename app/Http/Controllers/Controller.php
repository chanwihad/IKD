<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Models\IndikatorDetail;
use App\Models\ModelHasUser;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;
    protected $notif;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            if ($this->user->isVerifikator()) {
                $this->notif = IndikatorDetail::getNotifVerifikator($this->user->opd_id);
            }
            else if($this->user->isValidator()) {
                $this->notif = IndikatorDetail::getNotifValidator($this->user->opd_id);
            }
            else if($this->user->isAdministrator()) {
                $this->notif  = ModelHasUser::notif();
            }
            view()->share('notif', $this->notif);
            return $next($request);
        });
    }
    
}
