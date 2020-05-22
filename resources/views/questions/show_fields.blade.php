<!-- Num Field -->
<div class="form-group">
    {!! Form::label('num', 'Num:') !!}
    <p>{{ $question->num }}</p>
</div>

<!-- Question Field -->
<div class="form-group">
    {!! Form::label('question', 'Question:') !!}
    <p>{{ $question->question }}</p>
</div>

<!-- Answer Field -->
<div class="form-group">
    {!! Form::label('answer', 'Answer:') !!}
    <p>{{ $question->answer }}</p>
</div>

<!-- Search Terms Field -->
<div class="form-group">
    {!! Form::label('search_terms', 'Search Terms:') !!}
    <p>{{ $question->search_terms }}</p>
</div>

