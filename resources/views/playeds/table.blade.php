<div class="table-responsive">
    <table class="table" id="playeds-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Quiz Id</th>
        <th>Time</th>
        <th>Paid</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($playeds as $played)
            <tr>
                <td>{{ $played->user_id }}</td>
            <td>{{ $played->quiz_id }}</td>
            <td>{{ $played->time }}</td>
            <td>{{ $played->paid }}</td>
                <td>
                    {!! Form::open(['route' => ['playeds.destroy', $played->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('playeds.show', [$played->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('playeds.edit', [$played->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
