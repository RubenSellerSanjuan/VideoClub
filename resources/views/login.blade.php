<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .login-container {
            background-color: #ADD8E6;
            padding: 30px;
            border-radius: 8px;
            border: 5px solid #2b0091;
            max-width: 400px;
            margin: 50px auto;
        }
        .login-container h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .login-container .btn {
            background-color: #2b0091;
            color: #ffffff;
        }
        .login-container .btn:hover {
            background-color: #00098d;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container mt-4">
        <div class="login-container">
            <h1 class="text-center">Inicio de Sesión</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
