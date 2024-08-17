<!DOCTYPE html>
<html lang="pt-BR">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SISTEMA BREAKIE COFFEE </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="nav-bar">
        <a href="{{ url('encomenda/create') }}">Encomendas</a>
        <a href="{{ url('reserva/create') }}"> Reservas</a>
        <a href="{{ url('personalizado/create') }}"> Personalização</a>
        <a href="{{ url('estoque/create') }}"> Estoque</a>
        <a href="{{ url('sugestao/create') }}"> FeedBacks</a>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(248, 239, 154);
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }
        .nav-bar {
            background-color: #444;
            color: #fff;
            padding: 0.5rem;
            text-align: center;
        }
        .nav-bar a {
            color: #fff;
            text-decoration: none;
            margin: 0 1rem;
            font-weight: bold;
        }
        .nav-bar a:hover {
            text-decoration: underline;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 2rem;
            background-color: rgb(248, 239, 154);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>BREAKIE COFFEE☕</h1>
    </div>
    <div class="container">
        <h2>Olá, seja bem-vindo ao nosso sistema!</h2>
        <h4>Sua Cafeteria Preferida</h4>
        <p>Aqui você pode encontrar várias funcionalidades e informações.</p>
        <p>Utilize o menu para navegar pelas opções do nosso sistema!</p>
        <p>📩 contato.cafeteriabreakiecoffee@gmail.com</p>
          <p>☎️ (49)3324-6578</p>
        <br>
        <em>Alunas: Júlia Formagini Girardelo e Jhenyffer Gabrielly Carneiro</em>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Breakie Coffee</p>
        <p>Todos os direitos reservados</p>
    </div>
</body>
</html>
