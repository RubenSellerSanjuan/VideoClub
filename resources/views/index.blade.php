<!DOCTYPE html>
<html>
<head>
    <title>Producciones</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: url('https://sympli-blog-content.s3.amazonaws.com/dev/2021/04/capture-pattern-4.jpg');
            background-repeat: repeat;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.5);
            z-index: -1;
            pointer-events: none;
        }
        .content-container {
            background-color: #ADD8E6;
            padding: 20px;
            border-radius: 8px;
            border: 5px solid #2b0091;
        }
        .cart-icon {
            margin-right: 30px;
            font-size: 45px;
            color: #3074ce;
            text-decoration: none;
        }
        .cart-icon:hover {
            color: #00098d;
        }
        .cart-container {
            display: flex;
            justify-content: flex-end;
        }
        .search-container {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-right: 50px;
        }
        .search-container form {
            display: flex;
            width: 100%;
        }
        .search-container input {
            flex: 1;
            height: 50px;
            border: 2px solid #2b0091;
        }
        .search-container button {
            height: 50px;
        }
        @media (max-width: 768px) {
            .search-container {
                margin-bottom: 15px;
            }
            .search-container input {
                width: 100%;
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container mt-4 content-container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 style="font-size: 60px;">VideoClub Galaxy</h1>
                <h4>La galaxia cinematográfica a la vuelta de la esquina</h4>
            </div>
            <div>
                @auth
                <div style="display: flex; align-items: center;">
                    <div style="text-align: right; font-weight: bold; margin-right: 20px;">
                        <span style="font-size: 40px;">
                            Bienvenido
                        </span><br>
                        <span>
                            {{ $user->name }}<br>
                            ({{ $user->email }})
                        </span>
                        <br>
                    </div>
                    <a href="{{url('usuario')}}"><img src="https://cdn.pixabay.com/photo/2023/02/18/11/00/icon-7797704_1280.png"
                        alt="Usuario" style="border-radius: 50%; width: 100px; height: 100px; border: 2px solid #000000;"></a>
                </div>
                @else
                    <a href="{{url('login')}}" class="btn btn-primary mr-2">Iniciar Sesión</a>
                    <a href="{{url('register')}}" class="btn btn-primary">Registrarse</a>
                @endauth
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <div class="search-container">
                <form class="form-inline" action="{{ url('/') }}" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="query">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
            <div class="cart-container">
                <a href="{{url('cart')}}" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
        <h2 class="mt-4">Lista de Películas</h2>
        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $movie->image }}" class="card-img-top" alt="{{ $movie->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }} ({{ $movie->release_year }})</h5>
                            <p class="card-text">{{ Str::limit($movie->description, 100) }}</p>
                            <a href="{{ url('detalles_peli/' . $movie->id) }}" class="btn btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <h2 class="mt-4">Lista de Series</h2>
        <div class="row">
            @foreach ($series as $serie)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $serie->image }}" class="card-img-top" alt="{{ $serie->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $serie->title }} ({{ $serie->release_year }})</h5>
                            <p class="card-text">{{ Str::limit($serie->description, 100) }}</p>
                            <a href="{{ url('detalles_serie/' . $serie->id) }}" class="btn btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>