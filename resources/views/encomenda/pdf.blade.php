<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório PDF</title>
    <style>
        /* Estilos opcionais para a formatação do PDF */
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Relatório de Encomendas</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Descrição</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($encomendas as $encomenda)
            <tr>
                <td>{{ $encomenda->id }}</td>
                <td>{{ $encomenda->cliente }}</td>
                <td>{{ $encomenda->descricao }}</td>
                <td>{{ $encomenda->valor }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
