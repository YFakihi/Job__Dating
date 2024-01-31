@include("layouts.app")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('partners.create') }}"> Create New book</a>
            </div>
        </div>
    </div>
 
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>name</th>
            <th>location</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($partners as $partner)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $partner->name }}</td>
            <td>{{ $partner->description }}</td>
            <td>{{ $partner->industry }}</td>
            <td>{{ $partner->size }}</td>
            <td>{{ $partner->location }}</td>
            <td>
                <form action="{{ route('partners.destroy',$partner->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('partners.show',$partner->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('partners.edit',$partner->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $partners->links() !!}
      
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New company</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('partners.index') }}"> Back</a>
        </div>
    </div>
</div>
   
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