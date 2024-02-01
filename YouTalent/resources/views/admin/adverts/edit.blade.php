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

            <form action="{{ route('adverts.update', $advert->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">title:</label>
                    <input type="text" name="title" value="{{ $advert->title }}" class="form-control" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="content">content:</label>
                    <input type="text" name="content" value="{{ $advert->content }}" class="form-control"
                        placeholder="content">
                </div>

             

                <div class="mb-3">
                        <label for="advert_id" class="form-label">advert_id:</label>
                        <select name="advert_id" class="form-select">
                            <option value=""></option>
                            @foreach($partners as $partner)
                                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                            @endforeach
                        </select>
                        </div>

                

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
