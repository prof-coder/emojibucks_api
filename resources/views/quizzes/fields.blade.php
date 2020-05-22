<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Open Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('open_time', 'Open Time:') !!}
    {!! Form::text('open_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Close Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('close_time', 'Close Time:') !!}
    {!! Form::text('close_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Takings Field -->
<div class="form-group col-sm-6">
    {!! Form::label('takings', 'Takings:') !!}
    {!! Form::text('takings', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('quizzes.index') }}" class="btn btn-default">Cancel</a>
</div>
