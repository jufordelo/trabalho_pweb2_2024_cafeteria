<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório PDF</title>
</head>
<body>
    @foreach (reserva as reservas )
<h2> {{($reservas->nome)}}</h2> <br>
    @endforeach
