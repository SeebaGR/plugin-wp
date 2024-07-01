<!DOCTYPE html>
<html>
<head>
    <title>Obtener Tarifas</title>
</head>
<body>
    <h1>Tarifas</h1>
    @if(isset($data))
        <pre>{{ json_encode($data, JSON_PRETTY_PRINT) }}</pre>
    @else
        <p>No se encontraron tarifas.</p>
    @endif
</body>
</html>