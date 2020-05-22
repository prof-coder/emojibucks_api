<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $answer->user_id }}</p>
</div>

<!-- Quiz Id Field -->
<div class="form-group">
    {!! Form::label('quiz_id', 'Quiz Id:') !!}
    <p>{{ $answer->quiz_id }}</p>
</div>

<!-- Question Id Field -->
<div class="form-group">
    {!! Form::label('question_id', 'Question Id:') !!}
    <p>{{ $answer->question_id }}</p>
</div>

<!-- Answer Field -->
<div class="form-group">
    {!! Form::label('answer', 'Answer:') !!}
    <p>{{ $answer->answer }}</p>
</div>

<!-- Time Field -->
<div class="form-group">
    {!! Form::label('time', 'Time:') !!}
    <p>{{ $answer->time }}</p>
</div>

