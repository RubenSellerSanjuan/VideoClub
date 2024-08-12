<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Perfil</title>
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
        .user-container {
            background-color: #add8e6;
            padding: 30px;
            border-radius: 8px;
            border: 5px solid #2b0091;
            max-width: 600px;
            margin: 50px auto;
        }
        .btn-custom {
            background-color: #ff4545;
            color: #ffffff;
        }
        .btn-custom:hover {
            background-color: #880000;
            color: #ffffff;
        }
        .user-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 2px solid #007bff;
            margin-bottom: 20px;
        }
        .user-text {
            font-size: 36px;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container mt-4">
        <div class="user-container">
            <h1 class="text-center">Tus Datos</h1>
            <div class="text-center mb-4">
                <img src="https://cdn.pixabay.com/photo/2023/02/18/11/00/icon-7797704_1280.png" alt="Perfil" class="user-image">
                <h2 class="user-text">Nombre: {{ $user->name }}</h2>
                <h2 class="user-text">Email: {{ $user->email }}</h2>
            </div>
            <div class="text-center">
                <a href="{{ url('logout') }}" class="btn btn-custom">Cerrar Sesión</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
