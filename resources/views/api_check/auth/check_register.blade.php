
@extends('layouts.app')

@section('content')
    
  <form class="row" action="{!! url('/api/auths/register') !!}" style="padding-top: 50px;">

    <div class="col-sm-12 text-center">
      <h4>
        <strong>URL: </strong>
        {!! url('/api/auths/register') !!}
      </h4>
      <br>
      <br>
    </div>

    <div class="col-sm-offset-3 col-sm-6">
      <div class="form-group ">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', 'testuser@gmail.com', ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::text('password', '123456', ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('confirm_password', 'Confirm Password:') !!}
        {!! Form::text('confirm_password', '123456', ['class' => 'form-control']) !!}
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