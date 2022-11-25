@extends('layouts.template')

@section('title', 'User List')

@section('indicator-detail-list')

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
                    <h3 style="margin: 0px;"> Daftar Validasi User</h3>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="active" style="margin-right: 40px;">
                                <a class="nav-link open-tab" href="#" data-tab='a'>Semua User</a>
                            </li>
                            <li style="margin-right: 40px;">
                                <a class="nav-link open-tab" href="#" data-tab='b'>Daftar Registrasi</a>
                            </li>
                            <li style="margin-right: 40px;">
                                <a class="nav-link open-tab" href="#" data-tab='c'>Daftar Lupa Password</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =================USER KESELURUHAN================== -->
<div class="sm3-container tab" data-tab='a'>
    <div class=" row">
        <div class="col-md-12">
            <div class="sm3-card">
                <table class="table table-hover" id="model-list">
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
                                <a class="btn btn-danger fa fa-trash" href="{{route('adminUserValidationDelete', $datas->id)}}"></a>
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

<!-- =================USER KESELURUHAN================== -->
<div class="sm3-container tab" data-tab='b' style="display:none;">
    <div class=" row">
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
                        @foreach ($regis as $regiss)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <b>{{$regiss->name}}<b>
                            </td>
                            </a>
                            <td>
                                {{ $regiss->opd->name }}
                            </td>
                            <td>
                                {{ $regiss->nip }}
                            </td>
                            <td>
                                {{ $regiss->role }}
                            </td>
                            <td>
                                {{ $regiss->status }}
                            </td>
                            <td>
                                {{ $regiss->created_at }}
                            </td>
                            @if($user->isAdministrator())
                            <td>
                                @if($user->isAdministrator())
                                <a class="btn btn-primary fa fa-edit" href="{{route('adminUserRegisUpdate', $regiss->id)}}"></a>
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

<!-- =================USER KESELURUHAN================== -->
<div class="sm3-container tab" data-tab='c' style="display:none;">
    <div class=" row">
        <div class="col-md-12">
            <div class="sm3-card">
                <table class="table table-hover" id="pass-list">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">OPD</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Status</th>
                            <th scope="col">Waktu Registrasi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pass as $passs)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <b>{{$passs->name}}<b>
                            </td>
                            </a>
                            <td>
                                {{ $passs->opd->name }}
                            </td>
                            <td>
                                {{ $passs->nip }}
                            </td>
                            <td>
                                {{ $passs->status }}
                            </td>
                            <td>
                                {{ $passs->created_at }}
                            </td>
                            @if($user->isAdministrator())
                            <td>
                                @if($user->isAdministrator())
                                <a class="btn btn-primary fa fa-edit btn-action" href="{{route('adminUserForgetPasswordUpdate', $passs->id)}}"></a>
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

<script>
    $(document).ready(function() {
        $('#model-list').DataTable({
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
    $(document).ready(function() {
        $('#pass-list').DataTable({
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