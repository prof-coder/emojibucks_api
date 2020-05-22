
@extends('layouts.app')

@section('content')
    
  <form class="row" action="{!! url('/api/get_history_detail') !!}" style="padding-top: 50px;">

    <div class="col-sm-12 text-center">
      <h4>
        <strong>URL: </strong>
        {!! url('/api/get_history_detail') !!}
      </h4>
      <br>
      <br>
    </div>

    <div class="col-sm-offset-3 col-sm-6">
      <div class="form-group ">
        {!! Form::label('token', 'Token:') !!}
        {!! Form::text('token', 'b7aa5123a083f5013a58ab3dade333be3b7a417ad74932eb031d173b227d01de', ['class' => 'form-control']) !!}
      </div>
      <div class="form-group ">
        {!! Form::label('history_id', 'History Id:') !!}
        {!! Form::text('history_id', '2', ['class' => 'form-control']) !!}
      </div>
      <button class="btn btn-primary">Submit</button>
    </div>
  </form>
  <div class="row">
    <div class="col-sm-offset-3 col-sm-6" style="padding-top: 30px;">
      <label style="margin-bottom: 15px">Sending Data</label>
      <pre class="send-data" style="margin-bottom: 30px;border:1px solid #a5a5a5;background: #fff; min-height: 100px"></pre>
      <label style="margin-bottom: 15px">Response Data</label>
      <pre class="response-area" style="margin-bottom: 30px;border:1px solid #a5a5a5;background: #fff; min-height: 200px"></pre>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $('form').submit(function(e) {
      e.preventDefault();

      var $form = $(this);
      var action = $form.attr('action');
      placeSendData($form);

      $.ajax({
        url: action,
        type: 'POST',
        dataType: 'json',
        data: $form.serialize(),
        success: function(data) {
          console.log(data);
          $('.response-area').html(JSON.stringify(data, null, 4));
        },
        error: function(data) {
          console.log(data);
        }
      });
    });

    function placeSendData($form) {
      console.log(getFormData($form));
      $(".send-data").html(JSON.stringify(getFormData($form), null, 4));
    }

    function getFormData($form){
      var unindexed_array = $form.serializeArray();
      var indexed_array = {};

      $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
      });

      return indexed_array;
    }
  </script>
@endsection