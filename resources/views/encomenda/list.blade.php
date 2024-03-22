@extends('base')
@section('conteudo')
@section('titulo' , "Formulario Encomenda")
<body style="background-color:rgb(222, 198, 245);">

<h3> Listagem de Encomendas </h3>
<form action="{{route('encomenda.search')}}" method="post">
    <div class="row">
        @csrf
        <div class= "col-4">
            <label for="">Nome</label><br>
            <input type="text" name="nome" class="form-control"><br>
        </div>
        <div class="col-4" style="">
            <button type="submit"class="btn btn-info"><i class="fa-solid fa-user"></class=>
                </i> Buscar</button>
           <a href="{{url('encomenda/create')}}" class="btn btn-dark"><i class="fa-solid fa-cart-shopping" style="color: #B197FC;"></i></i>  Novo Pedido</a>
        </div>
    </div>
</form>

    <hr>
    <table class="table table-striped">
        <thead>
            <tr>    <th>ID</th>
                    <th>Nome</th>
                    <th>Contato</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th colspan="2">Ações</th>
                    <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($dados as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->contato}}</td>
                <td>{{$item->qnt}}</td>
                <td>{{$item->categoria->nome ?? ""}}</td>
                <td>Editar</td>
                <td><a href="{{route('encomenda.edit', $item->id)}}"> Editar </a></td>

                <td><form action="{{route('encomenda.destroy',$item)}}" method="post">
                @method("DELETE")
                @csrf
                <input type="submit" value="Deletar" class="btn btn-danger">
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@stop







