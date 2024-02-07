@include("layouts.app")

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                @if (Auth::user()->hasRole('superadmin'))
                    <a class="btn btn-success" href="{{ route('roles.create') }}">Add Roles</a>
                @endif
            </div></br></br>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-primary" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            @if (Auth::user()->hasRole('superadmin'))
            <th width="280px">Action</th>
            @endif
        </tr>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $role->name }}</td>
                @if (Auth::user()->hasRole('superadmin'))
                <td>
                    
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                       
                    </form>
                    
                </td>
                @endif
            </tr>
        @endforeach
    </table>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>

</html>
