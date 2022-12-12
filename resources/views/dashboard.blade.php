@extends('layouts.template')

@section('title', 'Dashboard')

@section('dashboard')

<div class="margin-judul">
    <h3 style="font-weight: 400;">Dashboard</h3>
    <h1>Aplikasi Indikator Kinerja Daerah</h1>
</div>

<div class="sm3-container">
    <div class="row sm3-card" style="padding: 50px 15px !important;">
        <div class="col-md-4">
            <h3>Hi, {{$user->name}}!</h3> <br><br>
            <p>Selamat datang di <b>SIDINDA.<br>
                </b> Kamu dapat melihat data indikator<br>
                dan mengelolanya disini<br></p> <br>
            @if($user->isAdministrator())
            <a href="{{ route('adminIndicatorDetailAllList') }}" class="btn btn-primary db-btn" role="button" aria-disabled="true">Daftar Indikator</a>
            @elseif($user->isVerifikator())
            <a href="{{ route('verifikatorIndicatorList') }}" class="btn btn-primary db-btn" role="button" aria-disabled="true">Daftar Indikator</a>
            @elseif($user->isValidator())
            <a href="{{ route('validatorIndicatorList') }}" class="btn btn-primary db-btn" role="button" aria-disabled="true">Daftar Indikator</a>
            @elseif($user->isProdusenData())
            <a href="{{ route('produsenDataIndicatorList') }}" class="btn btn-primary db-btn" role="button" aria-disabled="true">Daftar Indikator</a>
            @endif
        </div>
        <div class="col-md-8">
            <img class="db-img" src="{{ URL::asset('assets/img/dashboard.png') }}">
        </div>
    </div>
</div>

<div class="sm3-container">
    <div class="row">
        <div class="col-md-12">
            <div class="db-flex flex-column">
                <div class="col-md-6 sm3-card">
                    <div class="db-flex db-info">
                        <h1 class="db-h1">{{ $jumlah ?? ''}}</h1>
                        <p class="db-p">dari</p>
                        <h1 class="db-h1">{{ $total ?? ''}}</h1>
                        <p class="db-p">Jumlah Indikator OPD<br>{{ $opd }}</p>
                        <div class="icon-card2">
                            <i class="fa fa-angle-double-right"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 sm3-card">
                    <div class="db-flex db-info">
                        <h1 class="db-h1" style="margin-right:10px">{{ $persen ?? '' }}%</h1>
                        <p class="db-p">Persentase jumlah Indikator<br>dari Total Keseluruhan</p>
                        <div class="icon-card2">
                            <i class="fa fa-angle-double-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection