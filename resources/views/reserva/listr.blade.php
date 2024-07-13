@extends('base')
@section('conteudo')
@section('titulo', 'Formulario Reserva')

<body style="background-color:rgb(222, 198, 245);">

    <h3> Listagem de Reservas </h3>
    <h5>BREKIEE COFFEE <i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h5> <br>
    <form action="{{ route('reserva.search') }}" method="post">
        <div class="row">
            @csrf
            <div class="col-4">
                <label for=""> Nome</label><br>
                <input type="text" name="resp" class="form-control"><br>
            </div>

            <div class="col-4" style="">
                <div style="white-space: nowrap;">
                <button type="submit"class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i>
                </class></i> Buscar</button>
                <a href="{{url('reserva/create') }}" class="btn btn-dark"> <i class="fa-solid fa-pen-to-square"style="color: #a58eec;"></i></i> Nova Reserva</a>
                <a href="{{url('reserva/generatePDF')}}" class="btn btn-dark" style="display: inline-block;"><i class="fa-solid fa-file-pdf" style="color: #f27979;"></i>Relatório PDF</a>
                <a href="{{url('reserva/chart')}}" class="btn btn-dark" style="display: inline-block; margin-right: 10px;"><i class="fa-solid fa-layer-group" style="color: #7e71f8;"></i> Gráfico</a>

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
                <th colspan="2">EDITAR</th>
                <th colspan="2">EXCLUIR</th>
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
                    <td></td>
                    <td><a href="{{ route('reserva.edit', $item->id) }}"class="btn btn-dark"><i
                                class="fa-solid fa-pencil" style="color: #f04c7d;"></i></a></td>

                    <td>
                        <form action="{{ route('reserva.destroy', $item) }}" method="post">
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
