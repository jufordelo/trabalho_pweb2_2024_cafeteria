@extends('base')
@section('conteudo')
@section('titulo' , "Listagem Personalizado")
<body style="background-color:rgb(228, 226, 149);">

<h3> Listagem de Pedidos Personalizados </h3>
<header>
    <!-- Aqui vai o cabeçalho com logo, navegação principal, etc. -->
    <nav>
        <ul>
             <div class="col-4" style="">
                    <div style="white-space: nowrap;">
                        <h6> Menu de Controle Empresarial </h6>
                <a href="{{url('personalizado/create') }}" class="btn btn-dark "style="display: inline-block; margin-right: 5px;"> <i class="fa-solid fa-pen-to-square"style="color: #a58eec;"></i></i> Novo Personalizado</a>
                <a href="{{url('personalizado/report') }}" class="btn btn-dark"style="display: inline-block; margin-right: 5px;"><i class="fa-solid fa-file-pdf"style="color:#FF69B4 ;"></i> Relatório PDF</a>
                <a href="{{url('/personalizado/chart')}}" class="btn btn-dark" style="display: inline-block; margin-right: 5px;"><i class="fa-solid fa-layer-group" style="color: #7e71f8;"></i> Gráfico</a>
                        </div>

                </div>
        </ul>
    </nav>
</header>

<form action="{{route('personalizado.search')}}" method="post">
    <div class="row">
        @csrf
        <div class= "col-4">
            <label for=""> Nome</label><br>
            <input type="text" name="nome" class="form-control"><br>
        </div>

        <div class="col-6" style="margin-top: 22px;">
            <div style="white-space: nowrap;">
            <button type="submit"class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></class=>
                </i>Buscar</button>
                   
                </div>

        </div>
    </div>
</form>

    <hr>
    <table class="table table-striped">
        <thead>
            <tr>    <th>ID</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>KG</th>
                    <th>Hora Retirada</th>
                    <th>Data Retirada</th>
                    <th>Observações</th>
                    <th>Sabor Categoria</th>
                    <th colspan="2">EDITAR</th>
                    <th colspan="2">EXCLUIR</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($dados as $item)
            <tr>
                @php
                $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.jpg';
                @endphp

                <td>{{$item->id}}</td>
                <td><img src="/storage/{{ $nome_imagem }}" width="150px" alt="" /></td>
                <td>{{$item->nomec}}</td>
                <td>{{$item->tel}}</td>
                <td>{{$item->kg}}</td>
                <td>{{$item->horareti}}</td>
                <td>{{$item->datareti}}</td>
                <td>{{$item->obs}}</td>
                <td>{{$item->categoria->nome ?? ""}}</td>
                <td></td>
                <td><a href="{{route('personalizado.edit', $item->id)}}" class="btn btn-dark"><i class="fa-solid fa-pencil" style="color: #f04c7d;"></i></a></td>

                <td><form action="{{route('personalizado.destroy',$item)}}" method="post">
                @method("DELETE")
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







