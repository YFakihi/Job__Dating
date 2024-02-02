@include("layouts.app")

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title< /title>
</head>

<body>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('adverts.create') }}">Create New company</a>
            </div></br></br>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Number</th>
            <th>title</th>
            <th>content</th>
            <th>partner_name</th>
            <th width="280px">Action</th>
        </tr>
           @foreach ($adverts as $advert)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $advert->title }}</td>
            <td>{{ $advert->content }}</td>
            <td>{{ optional($advert->partner)->name }}</td>

            <td>
                <form action="{{ route('adverts.destroy', $advert->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('adverts.show', $advert->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('adverts.edit', $advert->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $adverts->links() !!}



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