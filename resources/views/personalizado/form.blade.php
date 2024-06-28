@extends('base')
@section('conteudo')

<body style="background-color:rgb(222, 198, 245);" > </body>

   <h3>BREKIEE COFFEE <i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h3> <br>
    <h4>Faça sua personalização de bolo:</h4>
    @php
        if (!empty($dado->id)) {
            $route = route('personalizado.update', $dado->id);
        } else {
            $route = route('personalizado.store');
        }
    @endphp
    <form action= "{{ $route }}" method="post">

        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id"
            value="@if (!empty($dado->id)) {{ $dado->id }} @else{{ '' }} @endif"><br>


        <label for="">Nome Completo</label> <br>
        <input type="text" name="nome" class="form-control"
            value="@if (!empty($dado->nome)) {{ $dado->nome }}
     @elseif (!empty(old('nome'))) {{ old('nome') }} else{{ '' }} @endif">
        <br>

        <label for="">Contato</label> <br>
        <input type="text" name="contato" class="form-control"
            value="@if (!empty($dado->contato)) {{ $dado->contato }}
     @elseif (!empty(old('contato'))) {{ old('contato') }} else{{ '' }} @endif">
        <br>


        <label for="">Peso do bolo</label>
        <input type="text" name="peso" class="form-control"
            value="@if (!empty($dado->peso)) {{ $dado->peso }}
     @elseif (!empty(old('peso'))) {{ old('peso') }} else{{ '' }} @endif">
        <br>


        <label for=""> Escolha uma opção de Sabor </label><br>
        <select name="categoria_personalizado_id" class="form-select">
            @foreach ($categoria_personalizados as $item)
                <option value="{{ $item->id }}">{{ $item->nome }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #B197FC;"></i>
Enviar</button>


        <button class="btn btn-dark"> <i class="fa-solid fa-rotate-left" style="color: #B197FC;"></i><a href="{{ url('personalizado') }} "></a>Voltar</a></button>

    </form>
@stop
