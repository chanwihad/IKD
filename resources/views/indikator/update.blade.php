@extends('layouts.template')

@section('title', 'create')

@section('indicator-update')

<div class="margin-judul">
  <h1>Ubah Indikator</h1>
  <ol class="breadcrumb" style="background: none; padding: 10px 0px;">
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="active">Ubah Indikator</li>
  </ol>
</div>

<div class="sm3-container">
  <div class="row">
    <div class="col-md-12">
      <div class="sm3-card">
        @if($user->isValidator())
        <form action="{{route('validatorIndicatorSave')}}" method="POST">
          @elseif($user->isProdusenData())
          <form action="{{route('produsenDataIndicatorSave')}}" method="POST">
            @endif
            {{ csrf_field() }}
            <br><br>
            @if($user->isValidator() || $user->isProdusenData())
            <input type="hidden" name="id" id="id" value="{{$data->id}}" />
            <div class="form-group row">
              <label for="colFormLabel" class="col-sm-2 col-form-label">Nama Indikator</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{old("name",$data->name)}}" placeholder="Nama Indikator">
                @if($errors->has('name'))
                <p class="alert-danger">{{$errors->first('name')}}</p>
                @endif
              </div>
            </div>
            @endif
            <br><br><br><br><br><br><br><br><br><br><br><br>
            <button type="submit" dusk="createMeeting" class="btn btn-primary btn-kanan" role="button" aria-disabled="true">Save Changes</button>
          </form>
          <a href="{{ url()->previous() }}" class="btn btn-danger btn-kanan" role="button" aria-disabled="true">Back</a><br><br>
      </div>
    </div>
  </div>
</div>

@endsection