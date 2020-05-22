<div class="table-responsive">
    <table class="table" id="contacts-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Email</th>
        <th>Message</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->user_id }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->message }}</td>
                <td>
                    {!! Form::open(['route' => ['contacts.destroy', $contact->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contacts.show', [$contact->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('contacts.edit', [$contact->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
