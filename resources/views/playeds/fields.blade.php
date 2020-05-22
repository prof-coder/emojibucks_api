<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Quiz Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quiz_id', 'Quiz Id:') !!}
    {!! Form::text('quiz_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', 'Time:') !!}
    {!! Form::text('time', null, ['class' => 'form-control']) !!}
</div>

<!-- Paid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paid', 'Paid:') !!}
    {!! Form::text('paid', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('playeds.index') }}" class="btn btn-default">Cancel</a>
</div>
