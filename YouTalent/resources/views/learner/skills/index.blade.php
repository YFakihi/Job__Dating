<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title Here</title>
    <!-- Include necessary scripts and styles here -->
</head>

<body>
    @include("layouts.app")

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left"></div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('skills.create') }}">Add Skills</a>
            </div>
            <br><br>
        </div>
    </div>

    <form action="" method="post">
        @csrf
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success">
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif

        <table id="table" class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <tr>
                <td><input type="text" name="inputs[0][name]" placeholder="Enter Skills"></td>
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More skills</button></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-success col-md-2">Save</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        var i = 0;

        $('#add').click(function () {
            ++i;
            $('#table').append(`
                <tr>
                    <td>
                        <input type="text" name="inputs[${i}][name]" placeholder="Enter your skills">
                    </td>
                    <td>

                        <button type="submit" class="btn btn-danger remove-table-row">Remove</button>

                    </td>
                </tr>
            `);

       
        });

        $(document).on('click','.remove-table-row', function(){
            $(this).parents('tr').remove();
                
            });
    </script>
</body>

</html>
