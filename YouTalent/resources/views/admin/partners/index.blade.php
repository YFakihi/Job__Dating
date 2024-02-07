@include("layouts.app")

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title</title>
</head>

<body>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
               
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('partners.create') }}">Create New company</a>
            </div></br></br>
        </div>
    </div>



    <nav class="nav nav-tabs nav-stacked my-5">
        <a class="nav-link" href="{{ route('partners.index') }}">List partners</a>
        <a class="nav-link" href="{{ route('partners.archive') }}">Archive Partners</a>
        <a class="nav-link" href="{{ route('partners.all') }}">All Partners</a> 
    </nav>

     <div class="my-5 mx-3" >
        <h4>{{$partners->count() }} partners</h4>
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
            <th>Description</th>
            <th>Industry</th>
            <th>Size</th>
            <th>Location</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($partners as $partner)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $partner->name }}</td>
            <td>{{ $partner->description }}</td>
            <td>{{ $partner->industry }}</td>
            <td>{{ $partner->size }}</td>
            <td>{{ $partner->location }}</td>
            <td>
                <form action="{{ route('partners.destroy', $partner->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('partners.show', $partner->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('partners.edit', $partner->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{-- {!! $partners->links() !!} --}}



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
