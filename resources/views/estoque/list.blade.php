@extends('base')
@section('conteudo')
@section('titulo', 'Listagem de Estoque')

<body style="background-color:rgb(228, 226, 149);">

    <h3> Listagem Estoque de Produtos </h3>
    <header>
        <!-- Aqui vai o cabeçalho com logo, navegação principal, etc. -->
        <nav>
            <ul>
              <div class="col-4" style="">
                    <div style="white-space: nowrap;">
                        <h6> Menu de Controle Empresarial </h6>
                <a href="{{url('estoque/create') }}" class="btn btn-dark "style="display: inline-block; margin-right: 5px;"> <i class="fa-solid fa-pen-to-square"style="color: #a58eec;"></i></i> Novo Cadastro </a>
                <a href="{{url('estoque/report') }}" class="btn btn-dark"style="display: inline-block; margin-right: 5px;"><i class="fa-solid fa-file-pdf"style="color:#FF69B4 ;"></i> Relatório PDF</a>
                <a href="{{url('/estoque/chart')}}" class="btn btn-dark" style="display: inline-block; margin-right: 5px;"><i class="fa-solid fa-layer-group" style="color: #7e71f8;"></i> Gráfico</a>
                        </div>

                </div>
            </ul>
        </nav>
    </header>

    <form action="{{ route('estoque.search') }}" method="post">
        <div class="row">
            @csrf
            <div class="col-4">
                <label for=""> Nome do Produto </label><br>
                <input type="text" name="assunto" class="form-control"><br>
            </div>

            <div class="col-6" style="margin-top: 22px;">
                <div style="white-space: nowrap;">
                <button type="submit"class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></class=>
                    </i> Buscar</button>
            
            </div>
        </div>
    </form>

    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Produto Cadastrado</th>
                <th>Tipo</th>
                <th>Validade</th>
                <th>Quantidade</th>
                <th colspan="2"></th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    @php
                    $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.jpg';
                @endphp

               <td><img src="/storage/{{ $nome_imagem }}" width="150px" alt="imagem" /></td>
                    <td>{{ $item->mprima }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>{{ $item->validade }}</td>
                    <td>{{ $item->quantidade }}</td>
                    <td><a href="{{ route('estoque.edit', $item->id) }}"class="btn btn-dark"><i
                                class="fa-solid fa-pencil" style="color: #f04c7d;"></i></a></td>

                    <td colspan="2">
                        <form action="{{ route('estoque.destroy', $item) }}" method="post">
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
