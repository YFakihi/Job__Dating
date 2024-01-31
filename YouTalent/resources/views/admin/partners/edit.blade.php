@extends("layouts.app")

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
         
            <hr>

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

            <form action="{{ route('partners.update', $partner->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{ $partner->name }}" class="form-control" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" value="{{ $partner->description }}" class="form-control"
                        placeholder="Description">
                </div>

                <div class="form-group">
                    <label for="industry">Industry:</label>
                    <input type="text" name="industry" value="{{ $partner->industry }}" class="form-control"
                        placeholder="Industry">
                </div>

                <div class="form-group">
                    <label for="size">Size:</label>
                    <select name="size" class="form-control">
                        <option value="small" {{ $partner->size == 'small' ? 'selected' : '' }}>Small</option>
                        <option value="medium" {{ $partner->size == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="large" {{ $partner->size == 'large' ? 'selected' : '' }}>Large</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" name="location" value="{{ $partner->location }}" class="form-control"
                        placeholder="Location">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
