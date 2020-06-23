<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    <style>
        body{
            background-color: red;
        }
        .contenedor{
            background-color: white;
            border-radius: 15px;
            font-size: 20px;
            width: 700px;
            height: 100px;
            margin: auto;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        {{ $error }}
    </div>
</body>
</html>