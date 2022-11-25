@extends('layouts.template')

@section('title', 'create')

@section('indicator-create')

<div class="margin-judul">
  <h1>Tambah Indikator</h1>
  <ol class="breadcrumb" style="background: none; padding: 10px 0px;">
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="active">Tambah Indikator</li>
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
            <div class="form-group row">
              <label for="colFormLabel" class="col-sm-2 col-form-label">Nama Indikator</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{old("name")}}" placeholder="Nama Indikator">
                @if($errors->has('name'))
                <p class="alert-danger">{{$errors->first('name')}}</p>
                @endif
              </div>
            </div>
            @endif
            <br><br><br><br><br><br><br><br><br><br><br><br>
            <button type="submit" dusk="createMeeting" class="btn btn-primary btn-kanan" role="button" aria-disabled="true">Confirm</button>
          </form>
          <a href="{{ url()->previous() }}" class="btn btn-danger btn-kanan" role="button" aria-disabled="true">Back</a><br><br>
      </div>
    </div>
  </div>
</div>


<script>
  (function($) {
    jQuery.fn.select2_e = function() {
      $(this).each(function(n, element) {

        //тут превращаем select в input              
        var $element = $(element),
          choices = $element.find('option').map(function(n, e) {
            var $e = $(e);
            return {
              id: $e.val(),
              text: $e.text()
            };
          }),
          width = $element.width(),
          $input = $('<input>', {
            width: width
          });
        $element.hide().after($input);

        //превратили
        $input.select2({
          query: function(query) {
            var data = {},
              i;
            data.results = [];

            // подтставим то что искали
            if (query.term !== "") {
              data.results.push({
                id: query.term,
                text: query.term
              });
            }

            // добавим остальное
            for (i = 0; i < choices.length; i++) {
              if (choices[i].text.match(query.term) || choices[i].id.match(query.term)) data.results.push(choices[i]);
            }
            query.callback(data);
          }
        }).on('change', function() {
          var value = $input.val();
          $element.empty();
          $element.append($('<option>').val(value))
          $element.val(value).trigger('change');
        });;
        return $element;
      });
      return this;
    }
  })(jQuery);

  //пример использования
  jQuery(function($) {
    $("#usr1").datepicker({
      dateFormat: "yy-mm-dd",
      // beforeShowDay: beforeShowDayHandler,
      showOn: 'both',
      onClose: function(dateText, inst) {
        $(this).attr("disabled", false);
      },
      beforeShow: function(input, inst) {
        $(this).attr("disabled", true);
      }

    });

    console.log($('.testclass').select2_e().on('change', function() {
      alert(this.value)
    }));
  });

  $(function() {
    $('.dates #usr1').datepicker({
      'format': 'yy-mm-dd',
      'autoclose': true
    });
  });
</script>

@endsection