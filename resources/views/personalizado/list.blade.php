@extends('base')
@section('conteudo')
@section('titulo' , "Listagem Personalização")
<body style="background-color:rgb(222, 198, 245);">

<h3> Listagem de Personalização </h3>
<h5>BREKIEE COFFEE <i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h5> <br>
<form action="{{route('personalizado.search')}}" method="post">
    <div class="row">
        @csrf
        <div class= "col-4">
            <label for=""> Nome</label><br>
            <input type="text" name="nome" class="form-control"><br>
        </div>

        <div class="col-4" style="">
            <button type="submit"class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></class=>
                </i> Buscar</button>

           <a href="{{url('personalizado/create')}}" class="btn btn-dark"><i class="fa-solid fa-cart-shopping" style="color: #B197FC;"></i></i>  Nova Personalização </a>
        </div>
    </div>
</form>

    <hr>
    <table class="table table-striped">
        <thead>
            <tr>    <th>ID</th>
                    <th>Nome</th>
                    <th>Contato</th>
                    <th>Peso</th>
                    <th>Sabor</th>
                    <th colspan="2">EDITAR</th>
                    <th colspan="2">EXCLUIR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->contato}}</td>
                <td>{{$item->peso}}</td>
                <td>{{$item->categoria_personalizado->nome ?? ""}}</td>
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







