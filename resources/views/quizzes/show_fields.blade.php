<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $quiz->name }}</p>
</div>

<!-- Open Time Field -->
<div class="form-group">
    {!! Form::label('open_time', 'Open Time:') !!}
    <p>{{ $quiz->open_time }}</p>
</div>

<!-- Close Time Field -->
<div class="form-group">
    {!! Form::label('close_time', 'Close Time:') !!}
    <p>{{ $quiz->close_time }}</p>
</div>

<!-- Takings Field -->
<div class="form-group">
    {!! Form::label('takings', 'Takings:') !!}
    <p>{{ $quiz->takings }}</p>
</div>

