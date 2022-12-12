@extends('layouts.template')

@section('title', 'List')

@section('indicator-detail-list')

<div class="margin-judul">
    <h1>Daftar Indikator Per Tahun</h1>
    <ol class="breadcrumb" style="background: none; padding: 10px 0px;">
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="active">Daftar Indikator Per Tahun</li>
    </ol>
</div>

<div class="sm3-container">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <div class="db-flex">
                    <h3 style="margin: 0px;"> Daftar Semua Data Indikator</h3>
                    @if($user->isValidator() || $user->isProdusenData())
                    <div style="margin-left:auto;">
                        <div class="db-flex">
                            <div class="db-flex" style="column-gap: 0px;">
                                <span class="input-group-addon span-share"><i class="fa fa-plus"></i></span>
                                @if($user->isValidator())
                                <a href="{{route('validatorIndicatorDetailCreate')}}" class="btn btn-primary btn-share" role="button" aria-disabled="true">Tambah Indikator</a>
                                @elseif($user->isProdusenData())
                                <a href="{{route('produsenDataIndicatorDetailCreate')}}" class="btn btn-primary btn-share" role="button" aria-disabled="true">Tambah Indikator</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<div>
    <div class="sm3-container">
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
                                <th scope="col">Validasi</th>
                                <th scope="col">Verifikasi</th>
                                <th scope="col">Publish</th>
                                <th scope="col">Status</th>
                                <th scope="col">Catatan</th>
                                @if(!$user->isAdministrator())
                                <th scope="col">Aksi</th>
                                @endif
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
                                    {{ $datas->target }}
                                </td>
                                <td >
                                    {{ $datas->capaian }}
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
                                @if(!$user->isAdministrator())
                                <td>
                                    @if($user->isValidator())
                                    <a class="btn btn-warning fa fa-edit btn-action" href="{{route('validatorIndicatorDetailUpdate', $datas->id)}}"></a>
                                    <a class="btn btn-danger fa fa-trash btn-action" href="{{route('validatorIndicatorDetailDelete', $datas->id)}}"></a>
                                    @elseif($user->isProdusenData())
                                    <a class="btn btn-warning fa fa-edit btn-action" href="{{route('produsenDataIndicatorDetailUpdate', $datas->id)}}"></a>
                                    <a class="btn btn-danger fa fa-trash btn-action" href="{{route('produsenDataIndicatorDetailDelete', $datas->id)}}"></a>
                                    @elseif($user->isVerifikator())
                                    <a class="btn btn-primary fa fa-edit btn-action" href="{{route('verifikatorIndicatorDetailUpdate', $datas->id)}}"></a>
                                    @endif
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table> <br>
                </div>
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
</script>
@endsection