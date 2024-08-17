@extends('base')
@section('conteudo')
@section('titulo', 'Formulario Sugestao')

<body style="background-color:rgb(228, 226, 149);">

    <h3> Sugestões e FeedBacks</h3>
    <header>
        <!-- Aqui vai o cabeçalho com logo, navegação principal, etc. -->
        <nav>
            <ul>
            <div class="col-4" style="">
                    <div style="white-space: nowrap;">
                        <h6> Menu de Controle Empresarial </h6>
                <a href="{{url('sugestao/create') }}" class="btn btn-dark "style="display: inline-block; margin-right: 5px;"> <i class="fa-solid fa-pen-to-square"style="color: #a58eec;"></i></i> Novo FeedBack</a>
                <a href="{{url('sugestao/report') }}" class="btn btn-dark"style="display: inline-block; margin-right: 5px;"><i class="fa-solid fa-file-pdf"style="color:#FF69B4 ;"></i> Relatório PDF</a>
                <a href="{{url('/sugestao/chart')}}" class="btn btn-dark" style="display: inline-block; margin-right: 5px;"><i class="fa-solid fa-layer-group" style="color: #7e71f8;"></i> Gráfico</a>
                        </div>
                </div>
            </div>
            </ul>
        </nav>
    </header>

    <form action="{{ route('sugestao.search') }}" method="post">
        <div class="row">
            @csrf
            <div class="col-4">
                <label for=""> Assunto </label><br>
                <input type="text" name="assunto" class="form-control"><br>
            </div>
            <div class="col-6" style="margin-top: 22px;">
            <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
            
        </div>
    </form>

    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Assunto</th>
                <th>Grau de atendimento</th>
                <th>Comentário</th>
                <th colspan="2">EDITAR</th>
                <th colspan="2">EXCLUIR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    <td>{{ $item->assunto }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>{{ $item->comentario }}</td>
                    <td><a href="{{ route('sugestao.edit', $item->id) }}"class="btn btn-dark"><i
                                class="fa-solid fa-pencil" style="color: #f04c7d;"></i></a></td>

                    <td colspan="2">
                        <form action="{{ route('sugestao.destroy', $item) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger" title="Deletar"
                                onclick="return confirm('Deseja realmente deletar esse registro?')">
                                <i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
