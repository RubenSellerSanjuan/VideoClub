<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Película</title>
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
        .movie-details-container {
            background-color: #ADD8E6;
            padding: 30px;
            border-radius: 8px;
            border: 5px solid #2b0091;
            max-width: 800px;
            margin: 50px auto;
        }
        .movie-details-container img {
            max-width: 100%;
            border-radius: 8px;
        }
        .btn-custom {
            background-color: #2b0091;
            color: #ffffff;
        }
        .btn-custom:hover {
            background-color: #00098d;
            color: #ffffff;
        }
        .btn-disabled {
            background-color: #ccc;
            color: #666;
            pointer-events: none;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container mt-4">
        <div class="movie-details-container">
            <h1 class="text-center">{{ $movie->title }}</h1>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $movie->image }}" alt="{{ $movie->title }}" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h4>Detalles</h4>
                    <p><strong>Año de Lanzamiento:</strong> {{ $movie->release_year }}</p>
                    <p><strong>Descripción:</strong></p>
                    <p>{{ $movie->description }}</p>
                    <p><strong>Géneros:</strong></p>
                    <ul>
                        @foreach ($movie->genres as $genre)
                            <li>{{ $genre->name }}</li>
                        @endforeach
                    </ul>
                    <p><strong>Cantidad Disponible:</strong> {{ $movie->quantity }}</p>
                    <p><strong>Precio de Compra:</strong> {{ number_format($movie->price, 2) }}€</p>
                    <p><strong>Precio de Alquiler:</strong> {{ number_format($movie->rent_price, 2) }}€</p>
                    <div class="mt-4">
                        @if ($movie->quantity > 0)
                            <form action="{{ route('cart.add', ['id' => $movie->id, 'type' => $movie->type, 'transactionType' => 'purchase']) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-custom">Comprar</button>
                            </form>
                            <form action="{{ route('cart.add', ['id' => $movie->id, 'type' => $movie->type, 'transactionType' => 'rental']) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-secondary">Alquilar</button>
                            </form>
                        @else
                            <button class="btn btn-disabled" disabled>Comprar</button>
                            <button class="btn btn-disabled" disabled>Alquilar</button>
                            <p class="text-danger mt-2">No hay disponibilidad.</p>
                        @endif
                        <a href="{{ url('/') }}" class="btn btn-link mt-2">Volver a la Lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
