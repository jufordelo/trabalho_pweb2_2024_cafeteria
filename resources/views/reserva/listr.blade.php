@extends('base')
@section('conteudo')
@section('titulo', 'Formulario Reserva')

<body style="background-color:rgb(222, 198, 245);">

<h3> Listagem de Reservas </h3>
<form action="{{ route('reserva.search') }}" method="post">
    <div class="row">
        @csrf
        <div class= "col-4">
            <label for="">Nome</label><br>
            <input type="text" name="nome" class="form-control"><br>
        </div>
        <div class="col-4" style="">
            <button type="submit" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i>
                </i> Buscar</button>
            <a href="{{ url('reserva/create') }}" class="btn btn-dark"> <i class="fa-solid fa-pen-to-square" style="color: #a58eec;"></i> </i> Nova
                Reserva</a>
        </div>
    </div>
</form>

<hr>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Responsável da Reserva</th>
            <th>Telefone</th>
            <th>Data da reserva</th>
            <th>Horário da reserva</th>
            <th>Quantidade de pessoas</th>
            <th>Escolha a Categoria</th>
            <th colspan="2">Ações</th>
            <th colspan="2">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->resp }}</td>
                <td>{{ $item->tel }}</td>
                <td>{{ $item->data }}</td>
                <td>{{ $item->hora }}</td>
                <td>{{ $item->pss }}</td>
                <td>{{ $item->categoria->nome ?? '' }}</td>
                <td>Editar</td>
                <td><a href="{{ route('reserva.edit', $item->id) }}"> Editar </a></td>

                <td><form action="{{ route('reserva.destroy', $item) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Deletar" class="btn btn-danger">
                    </form>

                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
