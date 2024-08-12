<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceder a Pago</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        .checkout-container {
            background-color: #ADD8E6;
            padding: 30px;
            border-radius: 8px;
            border: 5px solid #2b0091;
            max-width: 900px;
            margin: 50px auto;
        }
        .btn-custom {
            background-color: #2b0091;
            color: #ffffff;
        }
        .btn-custom:hover {
            background-color: #00098d;
            color: #ffffff;
        }
        .table thead th {
            background-color: #2b0091;
            color: #ffffff;
        }
        .alert-warning {
            margin-top: 20px;
        }
        .total-container {
            font-size: 1.5rem;
            font-weight: bold;
            border-top: 2px solid #2b0091;
            padding-top: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container mt-4">
        <div class="checkout-container">
            <h1 class="text-center">Proceder a Pago</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Tipo</th>
                        <th>Transacción</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cartItems as $item)
                        @php
                            if ($item->product_type === 'movie') {
                                $product = \App\Models\Movie::find($item->product_id);
                                $price = $item->transaction_type === 'purchase' ? $product->price : $product->rent_price;
                            } else {
                                $product = \App\Models\Serie::find($item->product_id);
                                $price = $item->transaction_type === 'purchase' ? $product->price : $product->rent_price;
                            }
                            $total += $price;
                        @endphp
                        <tr>
                            <td>
                                @if ($item->product_type === 'movie')
                                    {{ $product->title }}
                                @else
                                    {{ $product->title }}
                                @endif
                            </td>
                            <td>{{ ucfirst($item->product_type) }}</td>
                            <td>{{ ucfirst($item->transaction_type) }}</td>
                            <td>{{ number_format($price, 2) }}€</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($hasRentalItems)
                <div class="alert alert-warning" role="alert">
                    ¡Aviso! Las producciones alquiladas deben ser devueltas en un periodo de 7 días.
                </div>
            @endif
            <div class="total-container text-right">
                Total: {{ number_format($total, 2) }}€
            </div>
            <div class="text-center mt-4">
                <form action="{{ route('cart.proceedPayment') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-custom">Pagar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
