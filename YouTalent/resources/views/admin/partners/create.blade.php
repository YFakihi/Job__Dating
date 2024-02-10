@include("layouts.app")
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Partner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Add New Partners</h2>
                </div>
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

                <form action="{{ route('partners.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <input type="text" name="description" class="form-control" placeholder="Description">
                    </div>

                    <div class="mb-3">
                        <label for="industry" class="form-label">Industry:</label>
                        <input type="text" name="industry" class="form-control" placeholder="Industry">
                    </div>

                    <div class="mb-3">
                        <label for="size" class="form-label">Size:</label>
                        <select name="size" class="form-select">
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location:</label>
                        <input type="text" name="location" class="form-control" placeholder="Location">
                    </div>
                    

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div></br></br></br>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
