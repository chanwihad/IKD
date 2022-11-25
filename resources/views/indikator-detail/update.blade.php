@extends('layouts.template')

@section('title', 'create')

@section('indicator-detail-update')

<div class="margin-judul">
  <h1>Ubah Detail Indikator</h1>
  <ol class="breadcrumb" style="background: none; padding: 10px 0px;">
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="active">Ubah Detail Indikator</li>
  </ol>
</div>

<div class="sm3-container">
  <div class="row">
    <div class="col-md-12">
      <div class="sm3-card">
        @if($user->isValidator())
        <form action="{{route('validatorIndicatorDetailSave')}}" method="POST">
          @elseif($user->isProdusenData())
          <form action="{{route('produsenDataIndicatorDetailSave')}}" method="POST">
            @elseif($user->isVerifikator())
            <form action="{{route('verifikatorIndicatorDetailSave')}}" method="POST">
              @endif
              {{ csrf_field() }}
              <input type="hidden" name="id" id="id" value="{{$data->id}}" />
              <!-------------------- FORM -------------------->

              @if($user->isValidator() || $user->isProdusenData())
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Indikator</label>
                <div class="col-sm-10">
                  <select class="form-control" id="indikator_id" name="indikator_id">
                    <option value="" selected>Pilih Indikator</option>
                    @foreach($indikator as $datas)
                    <option value="{{ $datas->id }}" @if($datas->id==old("indikator_id",$data->indikator_id)) selected @endif > {{ $datas->name }} </option>
                    @endforeach
                  </select>
                  @if($errors->has('indikator_id'))
                  <p class="alert-danger">{{$errors->first('indikator_id')}}</p>
                  @endif
                </div>
              </div>
              @endif

              @if($user->isValidator() || $user->isProdusenData())
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Nilai</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nilai" name="nilai" value="{{old("nilai",$data->nilai)}}" placeholder="Nilai">
                  @if($errors->has('nilai'))
                  <p class="alert-danger">{{$errors->first('nilai')}}</p>
                  @endif
                </div>
              </div>
              @endif

              @if($user->isValidator() || $user->isProdusenData())
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="satuan" name="satuan" value="{{old("satuan",$data->satuan)}}" placeholder="Satuan">
                  @if($errors->has('satuan'))
                  <p class="alert-danger">{{$errors->first('satuan')}}</p>
                  @endif
                </div>
              </div>
              @endif

              @if($user->isValidator() || $user->isProdusenData())
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-10">
                  <input type="year" class="form-control" id="tahun" name="tahun" value="{{old("tahun",$data->tahun)}}" placeholder="Tahun">
                  @if($errors->has('tahun'))
                  <p class="alert-danger">{{$errors->first('tahun')}}</p>
                  @endif
                </div>
              </div>
              @endif

              @if($user->isValidator() || $user->isProdusenData())
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Target</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="target" name="target" value="{{old("target",$data->target)}}" placeholder="Target">
                  @if($errors->has('target'))
                  <p class="alert-danger">{{$errors->first('target')}}</p>
                  @endif
                </div>
              </div>
              @endif

              @if($user->isValidator() || $user->isProdusenData())
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Capaian</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="capaian" name="capaian" value="{{old("capaian",$data->capaian)}}" placeholder="Capaian">
                  @if($errors->has('capaian'))
                  <p class="alert-danger">{{$errors->first('capaian')}}</p>
                  @endif
                </div>
              </div>
              @endif

              @if($user->isValidator())
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Validasi</label>
                <div class="col-sm-10">
                  <select class="form-control" id="validasi" name="validasi">
                    <option value="" selected>Pilih Status Validasi</option>
                    <option value="1" @if(old("validasi",$data->validasi)=='1' )selected @endif>Tervalidasi</option>
                    <option value="0" @if(old("validasi",$data->validasi)=='0' )selected @endif>Belum Divalidasi</option>
                  </select>
                  @if($errors->has('validasi'))
                  <p class="alert-danger">{{$errors->first('validasi')}}</p>
                  @endif
                </div>
              </div>
              @endif

              @if($user->isVerifikator())
               <input type="hidden" name="indikator_id" id="indikator_id" value="{{$data->indikator_id}}" />
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Verifikasi</label>
                <div class="col-sm-10">
                  <select class="form-control" id="verifikasi" name="verifikasi">
                    <option value="" selected>Pilih Status Verifikasi</option>
                    <option value="1" @if(old("verifikasi",$data->verifikasi)=='1' )selected @endif>Terverifikasi</option>
                    <option value="0" @if(old("verifikasi",$data->verifikasi)=='0' )selected @endif>Belum Diverifikasi</option>
                  </select>
                  @if($errors->has('verifikasi'))
                  <p class="alert-danger">{{$errors->first('verifikasi')}}</p>
                  @endif
                </div>
              </div>
              @endif

              @if($user->isValidator() || $user->isProdusenData())
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Publish</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="publish" name="publish" value="{{old("publish",$data->publish)}}" placeholder="Publish">
                  @if($errors->has('publish'))
                  <p class="alert-danger">{{$errors->first('publish')}}</p>
                  @endif
                </div>
              </div>
              @endif

              @if($user->isValidator() || $user->isProdusenData())
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <select class="form-control" id="status" name="status">
                    <option value="" selected>Pilih Status Keaktifan</option>
                    <option value="1" @if(old("status",$data->status)=='1' )selected @endif>Aktif</option>
                    <option value="0" @if(old("status",$data->status)=='0' )selected @endif>Tidak Aktif</option>
                  </select>
                  @if($errors->has('status'))
                  <p class="alert-danger">{{$errors->first('status')}}</p>
                  @endif
                </div>
              </div>
              @endif

              @if($user->isVerifikator())
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="catatan" name="catatan" value="{{old("catatan",$data->catatan)}}" placeholder="Catatan">
                  @if($errors->has('catatan'))
                  <p class="alert-danger">{{$errors->first('catatan')}}</p>
                  @endif
                </div>
              </div>
              @endif
              <button type="submit" dusk="createMeeting" class="btn btn-primary btn-kanan" role="button" aria-disabled="true">Save Changes</button>
            </form>
            <a href="{{ url()->previous() }}" class="btn btn-danger btn-kanan" role="button" aria-disabled="true">Back</a><br><br>
      </div>
    </div>
  </div>
</div>


<script>
  $(function() {
    $('.dates #usr1').datepicker({
      'format': 'yy-mm-dd',
      'autoclose': true
    });
  });
</script>

@endsection