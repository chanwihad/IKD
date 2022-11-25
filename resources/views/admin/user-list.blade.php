@extends('layouts.template')

@section('title', 'User List')

@section('indicator-detail-list')

<div class="margin-judul">
    <h1>Manajemen Data Registrasi</h1>
    <ol class="breadcrumb" style="background: none; padding: 10px 0px;">
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="active">Daftar User</li>
    </ol>
</div>

<div class="sm3-container">
    <div class="row">
        <div class="col-md-12">
            <div class="sm3-card">
                <div class="db-flex">
                    <h3 style="margin: 0px;"> Daftar Semua User</h3>
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
                                <th scope="col">Nama</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Email</th>
                                <th scope="col">OPD</th>
                                <th scope="col">Status</th>
                                <th scope="col">Jabatan</th>
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
                                <td>
                                    <b>{{$datas->nip}}<b>
                                </td>
                                <td>
                                    <b>{{$datas->email}}<b>
                                </td>
                                </a>
                                <td>
                                    {{ $datas->opd->name }}
                                </td>
                                <td>
                                    {{ $datas->status }}
                                </td>
                                <td>
                                    {{ $datas->jabatan }}
                                </td>
                                @if($user->isAdministrator())
                                <td>
                                    @if($user->isAdministrator())
                                    <a class="btn btn-warning fa fa-edit btn-action" href="{{route('adminUserStatusUpdate', $datas->id)}}"></a>
                                    <a class="btn btn-danger fa fa-trash btn-action" href="{{route('adminUserDelete', $datas->id)}}"></a>
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