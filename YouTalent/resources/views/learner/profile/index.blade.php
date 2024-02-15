
<!DOCTYPE html>
<html lang="en">

@extends('layouts.app')


@section('content')
    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="path/to/select2.css">
    <script src="path/to/select2.js"></script>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <title>Document</title>
</head>



<body>
    <div class="container">
        <div class="main-body">


            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                           
                                <div class="mt-3">
                                    <p class="text-secondary mb-1">{{ Auth::user()->name }}</p>
                                    <p class="text-muted font-size-sm">{{ Auth::user()->email }}</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label for="update-title" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="update-title" name="name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="update-description" class="form-label">Email</label>
                                    <textarea class="form-control" id="update-description" name="email" rows="4">{{ Auth::user()->email }}</textarea>
                                </div>
                    
                                <!-- Multi-select input for skills -->
                                <div class="mb-3">
                                    <label for="update-skills" class="form-label">Select Skills</label>
                                    <select class="form-select" id="update-skills" name="skills[]" multiple>
                                        @foreach ($skills as $skill)
                                            <option value="{{ $skill->id }}" {{ in_array($skill->id, $selectedSkills) ? 'selected' : '' }}>
                                                {{ $skill->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                    
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                    

                    <div>
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">Skills</th>
                                </tr>
                            </thead>
                            <tbody> 
                               
                                    <tr>
                                      
                                        <td>{{ Auth::user()->name }}</td>
                                        <td>
                                            @foreach (Auth::user()->skills as $skill)
                                                {{ $skill->name }}
                                                @if (!$loop->last)
                                                    {{-- Add a comma if it's not the last skill --}}
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                           
                            </tbody>
                        </table>
                        
                    </div>


                    <!-- Add a new section for displaying applied advertisements -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h3>Your Adverts</h3>
                        <ul>
                            @foreach (Auth::user()->adverts as $appliedAdvert)
                                <li>{{ $appliedAdvert->title }}</li>
                                <p>{{ $appliedAdvert->content }}</p>
                                <p>Partner: {{ $appliedAdvert->partner->name }}</p>
                            @endforeach
                        </ul>
                    </div>
                </div>
                </div>



            </div>
        </div>

    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#update-skills').select2();
        });
    </script>
@endsection