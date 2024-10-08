@extends('base')
@section('conteudo')

<body style="background-color:rgb(228, 226, 149);" > </body>

    <h4>Faça sua Encomenda de Festa </h4>
    <h9>Caso queira personalizar sua encomenda clique abaixo:</h9>
    <a href="{{url('personalizado/create')}}" class="btn btn-outline-light  btn-sm text-dark" style="display: inline-block;"> Quero Personalizar </a>
    @php
        if (!empty($dado->id)) {
            $route = route('encomenda.update', $dado->id);
        } else {
            $route = route('encomenda.store');
        }
    @endphp
    <form action= "{{ $route }}" method="post">

        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id"
            value="@if (!empty($dado->id)) {{ $dado->id }} @else{{ '' }} @endif"><br>

        <label for="">Nome</label> <br>
        <input type="text" name="nome" class="form-control"
            value="@if (!empty($dado->nome)) {{ $dado->nome }}
     @elseif (!empty(old('nome'))) {{ old('nome') }} else{{ '' }} @endif">
        <br>

        <label for="">Contato</label> <br>
        <input type="text" name="contato" class="form-control"
            value="@if (!empty($dado->contato)) {{ $dado->contato }}
     @elseif (!empty(old('contato'))) {{ old('contato') }} else{{ '' }} @endif">
        <br>


        <label for="">Quantidade</label>
        <input type="text" name="qtn" class="form-control"
            value="@if (!empty($dado->qtn)) {{ $dado->qtn }}
     @elseif (!empty(old('qtn'))) {{ old('qtn') }} else{{ '' }} @endif">
        <br>


        <label for=""> Escolha uma opção</label><br>
        <select name="categoria_id" class="form-select">
            @foreach ($categorias as $item)
                <option value="{{ $item->id }}">{{ $item->nome }}</option>
            @endforeach
        </select>


<br>
        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #00FF7F;"></i>
Concluir Encomenda</button>

        <a class="btn btn-dark" href="{{ url('encomenda') }} "><i class="fa-solid fa-rotate-left"
            style="color: #ff3d3d;"></i> Voltar</a>
    </form>
@stop
