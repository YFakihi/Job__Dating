@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b4Iqk7g2bNhddZmFiLqQ8sP5YGXC22X7Uq02J49aU3+1e4b2qDNxh6Wb/KzV9E6IbSfcig6FYmPyQog4H4U5eg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- Fonts -->
    
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <!-- Your custom styles -->
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body class="antialiased">
    <div class="container mt-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
         
            </div>
        </nav>

        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
            @foreach ($adverts as $advert)
                <div class="col">
                    <div class="card">
                        <img src='https://img.freepik.com/free-photo/3d-render-megaphone-loudspeaker-with-flashes_107791-17345.jpg?w=740&t=st=1706873491~exp=1706874091~hmac=2e4197d22bbd9bc1c004761418646b67fa559d035519c3bda855d6de02c2a9d9' class="card-img-top" alt="Book Image">
                        <div class="card-body">
                            <h2 class="card-title">{{$advert->title}}</h2>
                            <p class="card-text">{{$advert->content}}</p>
                            <h2 class="card-title">{{$advert->partner->name}}</h2>
                            <button type="button" class="btn btn-warning">Apply now</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
  
@endsection
