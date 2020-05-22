<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $played->user_id }}</p>
</div>

<!-- Quiz Id Field -->
<div class="form-group">
    {!! Form::label('quiz_id', 'Quiz Id:') !!}
    <p>{{ $played->quiz_id }}</p>
</div>

<!-- Time Field -->
<div class="form-group">
    {!! Form::label('time', 'Time:') !!}
    <p>{{ $played->time }}</p>
</div>

<!-- Paid Field -->
<div class="form-group">
    {!! Form::label('paid', 'Paid:') !!}
    <p>{{ $played->paid }}</p>
</div>

