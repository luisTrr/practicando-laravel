<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scal">
    <title>DATOS</title>
</head>
<body>
    <div style="background: #fififi; width: 45%; heingt:">
    <h1>DATOS</h1>
    @foreach ($contenido as $c)
    <p><b>Nombre:</b>{{$c['nombre']}}</p>
    <p><b>Edad:</b>{{$c['edad']}}</p>
    @if($c['edad']>18)
    <p>es mayor de edad</b></p>
    @else
    <p>es menor de edad</b></p>
    @endif
    <p><b>------------------------</b></p>
    @endforeach
    </div>
</body>
</html>