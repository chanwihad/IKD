<!-- Start Left menu area -->
<div class="left-sidebar-pro">
    <nav id="sidebar" class="active">
        <div class="sidebar-header">
            <a href="{{ route('dashboard') }}"><img style="margin-top: 10px;" class="main-logo" src="{{ URL::asset('assets/img/logo/logopsn.png') }}" alt="" /></a>
            <strong><a href="{{ route('dashboard') }}"><img src="{{ URL::asset('assets/img/logo/logo.png') }}" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1"><br>
                    <li>
                        <a href="{{ route('dashboard') }}" aria-expanded="false"><span class="educate-icon educate-home icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Dashboard</span></a>
                    </li>
                    @if(Auth::User()->isVerifikator())
                    <li>
                        <a href="{{ route('verifikatorIndicatorList') }}" aria-expanded="false"><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Indikator List</span></a>
                    </li>
                    @elseif(Auth::User()->isValidator())
                    <li>
                        <a href="{{ route('validatorIndicatorList') }}" aria-expanded="false"><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Daftar Indikator</span></a>
                        <a href="{{ route('validatorIndicatorCreate') }}" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Buat Indikator Baru</span></a>
                        <a href="{{ route('validatorIndicatorDetailCreate') }}" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Tambah Data Indikator</span></a>
                    </li>
                    @elseif(Auth::User()->isProdusenData())
                    <li>
                        <a href="{{ route('produsenDataIndicatorList') }}" aria-expanded="false"><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Daftar Indikator</span></a>
                        <a href="{{ route('produsenDataIndicatorCreate') }}" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Buat Indikator Baru</span></a>
                        <a href="{{ route('produsenDataIndicatorDetailCreate') }}" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Tambah Data Indikator</span></a>
                    </li>
                    @elseif(Auth::User()->isAdministrator())
                    <li>
                        <a href="{{ route('adminIndicatorDetailAllList') }}" aria-expanded="false"><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Semua Detail Indikator</span></a>
                        <a href="{{ route('adminIndicatorList') }}" aria-expanded="false"><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Daftar Indikator</span></a>
                        <a href="{{ route('adminUserList') }}" aria-expanded="false"><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Daftar User</span></a>
                        <a href="{{ route('adminUserValidationList') }}" aria-expanded="false"><span class="educate-icon educate-event icon-wrap"></span> <span class="mini-click-non">Daftar Validasi</span></a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- End Left menu area -->