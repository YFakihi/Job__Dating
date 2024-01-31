@extends("layouts.app")

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
           
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $partner->name }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Description:</strong>
                        {{ $partner->description }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Industry:</strong>
                        {{ $partner->industry }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Size:</strong>
                        {{ $partner->size }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Location:</strong>
                        {{ $partner->location }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
