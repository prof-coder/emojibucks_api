<!-- Winner Id Field -->
<div class="form-group">
    {!! Form::label('winner_id', 'Winner Id:') !!}
    <p>{{ $result->winner_id }}</p>
</div>

<!-- Quiz Id Field -->
<div class="form-group">
    {!! Form::label('quiz_id', 'Quiz Id:') !!}
    <p>{{ $result->quiz_id }}</p>
</div>

<!-- Prize Field -->
<div class="form-group">
    {!! Form::label('prize', 'Prize:') !!}
    <p>{{ $result->prize }}</p>
</div>

<!-- Paid Field -->
<div class="form-group">
    {!! Form::label('paid', 'Paid:') !!}
    <p>{{ $result->paid }}</p>
</div>

