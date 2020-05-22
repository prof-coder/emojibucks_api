<div class="table-responsive">
    <table class="table" id="quizzes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Open Time</th>
        <th>Close Time</th>
        <th>Takings</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($quizzes as $quiz)
            <tr>
                <td>{{ $quiz->name }}</td>
            <td>{{ $quiz->open_time }}</td>
            <td>{{ $quiz->close_time }}</td>
            <td>{{ $quiz->takings }}</td>
                <td>
                    {!! Form::open(['route' => ['quizzes.destroy', $quiz->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('quizzes.show', [$quiz->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('quizzes.edit', [$quiz->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
