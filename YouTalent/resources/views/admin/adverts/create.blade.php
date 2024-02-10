    @include("layouts.app")
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New advert</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <link rel="stylesheet" href="path/to/select2.css">
        <script src="path/to/select2.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    </head>

    <body class="bg-light">

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Add New adverts</h2>
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

                    <form action="{{ route('adverts.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">title:</label>
                            <input type="text" name="title" class="form-control" placeholder="title">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">content:</label>
                            <input type="text" name="content" class="form-control" placeholder="content">
                        </div>

                    

                        <div class="mb-3">
                        <label for="partner_id" class="form-label">partner_id:</label>
                        <select name="partner_id" class="form-select">
                            <option value=""></option>
                            @foreach($partners as $partner)
                                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                            @endforeach
                        </select>
                        </div>

                        <select class="form-select" id="update-skills" name="skill_ids[]" multiple>
                            @foreach ($allskills as $oneskill)
                                <option value="{{ $oneskill->id }}">
                                    {{ $oneskill->name }}
                                </option>
                            @endforeach
                        </select>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div></br></br></br>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
    <script>
        $(document).ready(function() {
            $('#update-skills').select2();
        });
    </script>
