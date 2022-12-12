@extends('layouts.template')

@section('title', 'List')

@section('indicator-list')

<div class="margin-judul">
    <h1>Daftar Per Indikator</h1>
    <ol class="breadcrumb" style="background: none; padding: 10px 0px;">
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="active">Daftar Per Indikator</li>
    </ol>
</div>

<div class="sm3-container">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <div class="db-flex">
                    <h3 style="margin: 0px;"> Daftar Indikator</h3>
                    @if($user->isValidator() || $user->isProdusenData())
                    <div style="margin-left:auto;">
                        <div class="db-flex">
                            <div class="db-flex" style="column-gap: 0px;">
                                <span class="input-group-addon span-share"><i class="fa fa-plus"></i></span>
                                @if($user->isValidator())
                                <a href="{{ route('validatorIndicatorCreate') }}" class="btn btn-primary btn-share" role="button" aria-disabled="true">Buat Indikator</a>
                                @elseif($user->isProdusenData())
                                <a href="{{ route('produsenDataIndicatorCreate') }}" class="btn btn-primary btn-share" role="button" aria-disabled="true">Buat Indikator</a>
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
                                <th scope="col">Jumlah</th>
                                @if($user->isAdministrator())
                                <th scope="col">OPD</th>
                                @else
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
                                @endif
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $datas)
                            @foreach($datas->indikatorDetail as $detail)
                            @endforeach
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <b>{{$datas->name}}<b>
                                </td>
                                </a>
                                <td>
                                    {{ $datas->jumlah }}
                                </td>
                                @if($user->isAdministrator())
                                <td>
                                    {{ $datas->opd->name }}
                                </td>
                                @else
                                <td>
                                    {{ $detail->nilai ?? ''}}
                                </td>
                                <td>
                                    {{ $detail->satuan ?? ''}}
                                </td>
                                <td>
                                    {{ $detail->tahun ?? ''}}
                                </td>
                                <td>
                                    {{ $detail->target ?? ''}}
                                </td>
                                <td>
                                    {{ $detail->tahun ?? ''}}
                                </td>
                                <td>
                                    @if(isset($detail))
                                    @if($detail->validasi == 1)
                                    <p><span class="badge-success">Tervalidasi</span></p>
                                    @elseif($detail->validasi == 0)
                                    <p><span class="badge-warning">Tidak Divalidasi</span></p>
                                    @endif
                                    @else
                                    <p><span class="badge-secondary">Kosong</span></p>
                                    @endif
                                </td>
                                <td>
                                    @if(isset($detail))
                                    @if($detail->verifikasi == 1)
                                    <p><span class="badge-success">Terverifikasi</span></p>
                                    @elseif($detail->verifikasi == 0)
                                    <p><span class="badge-warning">Tidak Diverifikasi</span></p>
                                    @endif
                                    @else
                                    <p><span class="badge-secondary">Kosong</span></p>
                                    @endif
                                </td>
                                <td>
                                    {{ $detail->publish ?? ''}}
                                </td>
                                <td>
                                    @if(isset($detail))
                                    @if($detail->status == 1)
                                    <p><span class="badge-success">Aktif</span></p>
                                    @elseif($detail->status == 0)
                                    <p><span class="badge-warning">Tidak Aktif</span></p>
                                    @endif
                                    @else
                                    <p><span class="badge-secondary">Kosong</span></p>
                                    @endif
                                </td>
                                <td>
                                    {{ $detail->catatan ?? ''}}
                                </td>
                                @endif
                                <td class="td-action">
                                    @if($user->isValidator())
                                    <a class="btn btn-primary fa fa-info-circle btn-action" href="{{route('validatorIndicatorDetailList', $datas->id)}}"></a>
                                    <a class="btn btn-warning fa fa-edit btn-action"  href="{{route('validatorIndicatorUpdate', $datas->id)}}"></a>
                                    <a class="btn btn-danger fa fa-trash btn-action" href="{{route('validatorIndicatorDelete', $datas->id)}}"></a>
                                    @elseif($user->isProdusenData())
                                    <a class="btn btn-primary fa fa-info-circle btn-action" href="{{route('produsenDataIndicatorDetailList', $datas->id)}}"></a>
                                    <a class="btn btn-warning fa fa-edit btn-action" href="{{route('produsenDataIndicatorUpdate', $datas->id)}}"></a>
                                    <a class="btn btn-danger fa fa-trash btn-action" href="{{route('produsenDataIndicatorDelete', $datas->id)}}"></a>
                                    @elseif($user->isVerifikator())
                                    <a class="btn btn-primary fa fa-info-circle btn-action" href="{{route('verifikatorIndicatorDetailList', $datas->id)}}"></a>
                                    @elseif($user->isAdministrator())
                                    <a class="btn btn-primary fa fa-info-circle btn-action" href="{{route('adminIndicatorDetailList', $datas->id)}}"></a>
                                    @endif
                                </td>
                            </tr>
                            <?php $detail = null ?>
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
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                },
            ]
        });
    });
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>

@endsection