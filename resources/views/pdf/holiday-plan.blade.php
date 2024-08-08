<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plano de Férias</title>
    <style>
        /* Estilos CSS para formatação do PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <h1>Plano de Férias</h1>
    <p><strong>Título:</strong> {{ $plan->title}}</p>
    <p><strong>Descrição:</strong> {{ $plan->description }}</p>
    <p><strong>Data:</strong> {{ $plan->date}}</p>
    <p><strong>Local:</strong> {{ $plan->location }}</p>
    @if($plan->participants)
    <p><strong>Participantes:</strong> {{ implode(', ', $plan->participants)}}</p>
    @endif
</body>

</html>
