<!-- Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num', 'Num:') !!}
    {!! Form::number('num', null, ['class' => 'form-control']) !!}
</div>

<!-- Question Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::text('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Answer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer', 'Answer:') !!}
    {!! Form::text('answer', null, ['class' => 'form-control']) !!}
</div>

<!-- Search Terms Field -->
<div class="form-group col-sm-6">
    {!! Form::label('search_terms', 'Search Terms:') !!}
    {!! Form::text('search_terms', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('questions.index') }}" class="btn btn-default">Cancel</a>
</div>
