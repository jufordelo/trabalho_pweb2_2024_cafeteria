@extends('base')
@section('conteudo')
@section('titulo' , "Formulario Inscrição")
<body style="background-color:rgb(222, 198, 245);">

<h3> Listagem da Inscrição </h3>
<h5>BREKIEE COFFEE <i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h5> <br>
<form action="{{route('inscricao.search')}}" method="post">
    <div class="row">
        @csrf
        <div class= "col-4">
            <label for="">Nome</label><br>
            <input type="text" name="nome" class="form-control"><br>
        </div>

        <div class="col-4" style="">
            <button type="submit"class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></class=>
                </i> Buscar</button>

           <a href="{{url('inscricao/create')}}" class="btn btn-dark"><i class="fa-solid fa-cart-shopping" style="color: #B197FC;"></i></i> Nova Inscrição</a>
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
                    <th>Instagram</th>
                    <th>Categoria</th>
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
                <td><img src="/storage/{{ $nome_imagem }}" width="150px" alt="imagem" /></td>


                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->telefone}}</td>
                <td>{{$item->insta}}</td>
                <td>{{$item->categoria_inscricao->nome ?? ""}}</td>
                <td></td>
                <td><a href="{{route('inscricao.edit', $item->id)}}" class="btn btn-dark"><i class="fa-solid fa-pencil" style="color: #f04c7d;"></i></a></td>

                <td><form action="{{route('inscricao.destroy',$item)}}" method="post">
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







