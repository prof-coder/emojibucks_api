<!-- Winner Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('winner_id', 'Winner Id:') !!}
    {!! Form::text('winner_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Quiz Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quiz_id', 'Quiz Id:') !!}
    {!! Form::text('quiz_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Prize Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prize', 'Prize:') !!}
    {!! Form::number('prize', null, ['class' => 'form-control']) !!}
</div>

<!-- Paid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paid', 'Paid:') !!}
    {!! Form::text('paid', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('results.index') }}" class="btn btn-default">Cancel</a>
</div>
