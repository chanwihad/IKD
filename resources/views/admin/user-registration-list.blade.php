@extends('layouts.template')

@section('title', 'User List')

@section('user-validation-list')

<div class="margin-judul">
    <h1>Manajemen Data Registrasi</h1>
    <ol class="breadcrumb" style="background: none; padding: 10px 0px;">
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="active">Daftar Registrasi</li>
    </ol>
</div>

<div class="sm3-container">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <div class="db-flex">
                    <h3 style="margin: 0px;"> Daftar Semua Registrasi</h3>
                    <!-- <div style="margin-left:auto;">
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
                    </div> -->
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
                    <table class="table table-hover" id="regis-list">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">OPD</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Waktu Registrasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $datas)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>

                                    <b>{{$datas->name}}<b>

                                </td>
                                </a>
                                <td>
                                    {{ $datas->opd->name }}
                                </td>
                                <td>
                                    {{ $datas->nip }}
                                </td>
                                <td>
                                    {{ $datas->role }}
                                </td>
                                <td>
                                    {{ $datas->status }}
                                </td>
                                <td>
                                    {{ $datas->created_at }}
                                </td>
                                @if($user->isAdministrator())
                                <td>
                                    @if($user->isAdministrator())
                                    <a class="btn btn-primary fa fa-edit btn-action" href="{{route('adminUserRegisUpdate', $datas->id)}}"></a>
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
        $('#regis-list').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
            ]
        });
    });
</script>

@endsection