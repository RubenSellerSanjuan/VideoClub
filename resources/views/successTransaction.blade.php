<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://sympli-blog-content.s3.amazonaws.com/dev/2021/04/capture-pattern-4.jpg');
            background-repeat: repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #add8e6;
            padding: 30px;
            border-radius: 8px;
            border: 5px solid #2b0091;
            text-align: center;
        }
        .checkmark-image {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            color: #ffffff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://img.icons8.com/ios/452/checkmark.png" alt="Checkmark" class="checkmark-image">
        <h1>Gracias por confiar en nosotros!</h1>
        <a href="{{ url('/') }}" class="btn btn-custom mt-4">Volver a la Página Principal</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
