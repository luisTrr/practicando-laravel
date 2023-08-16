<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticia</title>
</head>
<body>
<ul>
<h1>NOTICIAS</h1>
<div>
@foreach ($noticias as $noticia)
    <strong>Titulo:</strong> {{ $noticia->Titulo }}<br>

    <strong>Contenido:</strong> {{ $noticia->contenido }}<br>
@endforeach
</div>
</ul>
</body>
</html>