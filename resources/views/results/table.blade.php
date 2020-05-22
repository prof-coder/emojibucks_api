<div class="table-responsive">
    <table class="table" id="results-table">
        <thead>
            <tr>
                <th>Winner Id</th>
        <th>Quiz Id</th>
        <th>Prize</th>
        <th>Paid</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
            <tr>
                <td>{{ $result->winner_id }}</td>
            <td>{{ $result->quiz_id }}</td>
            <td>{{ $result->prize }}</td>
            <td>{{ $result->paid }}</td>
                <td>
                    {!! Form::open(['route' => ['results.destroy', $result->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('results.show', [$result->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('results.edit', [$result->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
