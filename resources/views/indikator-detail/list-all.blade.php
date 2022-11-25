@extends('layouts.template')

@section('title', 'List')

@section('indicator-detail-list')

<div class="margin-judul">
    <h1>Manajemen Data Indikator</h1>
    <ol class="breadcrumb" style="background: none; padding: 10px 0px;">
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="active">Semua Detail Indikator</li>
    </ol>
</div>

<div class="sm3-container">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <div class="db-flex">
                    <h3 style="margin: 0px;"> Daftar Semua Data Indikator</h3>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">

                            <li class="active" style="margin-right: 40px;">
                                <a class="nav-link open-tab" href="#" data-tab='a'>Data Keseluruhan</a>
                            </li>
                            <li style="margin-right: 40px;">
                                <a class="nav-link open-tab" href="#" data-tab='b'>Data Terverifikasi</a>
                            </li>
                            <li style="margin-right: 40px;">
                                <a class="nav-link open-tab" href="#" data-tab='c'>Data Belum Terverifikasi</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =================DATA KESELURUHAN================== -->
<div class="sm3-container tab" data-tab='a'>
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <table class="table table-hover" id="indikator-list">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Indikator</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Target</th>
                            <th scope="col">Capaian</th>
                            <th scope="col">OPD</th>
                            <th scope="col">Validasi</th>
                            <th scope="col">Verifikasi</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Status</th>
                            <th scope="col">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $datas)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <b>{{$datas->indikator->name}}<b>
                            </td>
                            </a>
                            <td>
                                {{ $datas->nilai }}
                            </td>
                            <td>
                                {{ $datas->satuan }}
                            </td>
                            <td>
                                {{ $datas->tahun }}
                            </td>
                            <td>
                                {{ $datas->indikator->opd->name }}
                            </td>
                            <td>
                                @if($datas->validasi == 1)
                                <h5><span class="badge-success">Tervalidasi</span></h5>
                                @elseif($datas->validasi == 0)
                                <h5><span class="badge-warning">Belum Divalidasi</span></h5>
                                @else
                                <h5><span class="badge-secondary">Kosong</span></h5>
                                @endif
                            </td>
                            <td>
                                @if($datas->verifikasi == 1)
                                <h5><span class="badge-success">Terverifikasi</span></h5>
                                @elseif($datas->verifikasi == 0)
                                <h5><span class="badge-warning">Belum Diverifikasi</span></h5>
                                @else
                                <h5><span class="badge-secondary">Kosong</span></h5>
                                @endif
                            </td>
                            <td>
                                {{ $datas->publish }}
                            </td>
                            <td>
                                @if($datas->status == 1)
                                <h5><span class="badge-success">Aktif</span></h5>
                                @elseif($datas->status == 0)
                                <h5><span class="badge-warning">Tidak Aktif</span></h5>
                                @else
                                <h5><span class="badge-secondary">Kosong</span></h5>
                                @endif
                            </td>
                            <td>
                                {{ $datas->catatan }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> <br>
            </div>
        </div>
    </div>
</div>


<!-- =================DATA KESELURUHAN================== -->
<div class="sm3-container tab" data-tab='b' style="display:none;">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <table class="table table-hover" id="indikator-list-verifikasi">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Indikator</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Target</th>
                            <th scope="col">Capaian</th>
                            <th scope="col">OPD</th>
                            <th scope="col">Validasi</th>
                            <th scope="col">Verifikasi</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Status</th>
                            <th scope="col">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($verified as $verifieds)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>

                                <b>{{$verifieds->indikator->name}}<b>

                            </td>
                            </a>
                            <td>
                                {{ $verifieds->nilai }}
                            </td>
                            <td>
                                {{ $verifieds->satuan }}
                            </td>
                            <td>
                                {{ $verifieds->tahun }}
                            </td>
                            <td>
                                {{ $verifieds->indikator->opd->name }}
                            </td>
                            <td>
                                @if($verifieds->validasi == 1)
                                <h5><span class="badge-success">Tervalidasi</span></h5>
                                @elseif($verifieds->validasi == 0)
                                <h5><span class="badge-warning">Belum Divalidasi</span></h5>
                                @else
                                <h5><span class="badge-secondary">Kosong</span></h5>
                                @endif
                            </td>
                            <td>
                                @if($verifieds->verifikasi == 1)
                                <h5><span class="badge-success">Terverifikasi</span></h5>
                                @elseif($verifieds->verifikasi == 0)
                                <h5><span class="badge-warning">Belum Diverifikasi</span></h5>
                                @else
                                <h5><span class="badge-secondary">Kosong</span></h5>
                                @endif
                            </td>
                            <td>
                                {{ $verifieds->publish }}
                            </td>
                            <td>
                                @if($verifieds->status == 1)
                                <h5><span class="badge-success">Aktif</span></h5>
                                @elseif($verifieds->status == 0)
                                <h5><span class="badge-warning">Tidak Aktif</span></h5>
                                @else
                                <h5><span class="badge-secondary">Kosong</span></h5>
                                @endif
                            </td>
                            <td>
                                {{ $verifieds->catatan }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> <br>
            </div>
        </div>
    </div>
</div>

<!-- =================DATA KESELURUHAN================== -->
<div class="sm3-container tab" data-tab='c' style="display:none;">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <table class="table table-hover" id="indikator-list-belum-verifikasi">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Indikator</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Target</th>
                            <th scope="col">Capaian</th>
                            <th scope="col">OPD</th>
                            <th scope="col">Validasi</th>
                            <th scope="col">Verifikasi</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Status</th>
                            <th scope="col">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unverified as $unverifieds)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>

                                <b>{{$unverifieds->indikator->name}}<b>

                            </td>
                            </a>
                            <td>
                                {{ $unverifieds->nilai }}
                            </td>
                            <td>
                                {{ $unverifieds->satuan }}
                            </td>
                            <td>
                                {{ $unverifieds->tahun }}
                            </td>
                            <td>
                                {{ $unverifieds->indikator->opd->name }}
                            </td>
                            <td>
                                @if($unverifieds->validasi == 1)
                                <h5><span class="badge-success">Tervalidasi</span></h5>
                                @elseif($unverifieds->validasi == 0)
                                <h5><span class="badge-warning">Belum Divalidasi</span></h5>
                                @else
                                <h5><span class="badge-secondary">Kosong</span></h5>
                                @endif
                            </td>
                            <td>
                                @if($unverifieds->verifikasi == 1)
                                <h5><span class="badge-success">Terverifikasi</span></h5>
                                @elseif($unverifieds->verifikasi == 0)
                                <h5><span class="badge-warning">Belum Diverifikasi</span></h5>
                                @else
                                <h5><span class="badge-secondary">Kosong</span></h5>
                                @endif
                            </td>
                            <td>
                                {{ $unverifieds->publish }}
                            </td>
                            <td>
                                @if($unverifieds->status == 1)
                                <h5><span class="badge-success">Aktif</span></h5>
                                @elseif($unverifieds->status == 0)
                                <h5><span class="badge-warning">Tidak Aktif</span></h5>
                                @else
                                <h5><span class="badge-secondary">Kosong</span></h5>
                                @endif
                            </td>
                            <td>
                                {{ $unverifieds->catatan }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> <br>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#indikator-list').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
            ]
        });
    });
    $(document).ready(function() {
        $('#indikator-list-verifikasi').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
            ]
        });
    });
    $(document).ready(function() {
        $('#indikator-list-belum-verifikasi').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
            ]
        });
    });
    $(function() {
        // When an open tab item from your menu is clicked
        $(".open-tab").click(function() {
            // Hide any of the content tabs
            $(".tab").hide();
            // Show your active tab (read from your data attribute)
            $('[data-tab ="' + $(this).data('tab') + '"]').show();
            // Optional: Highlight the selected tab
            $('li.active').removeClass('active');
            $(this).closest('li').addClass('active');
        });
    });
</script>
@endsection