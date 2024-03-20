@extends('base')
@section('conteudo')

    <h3>Faça sua Reserva abaixo:</h3>
    @php
        if (!empty($dado->id)) {
            $route = route('reserva.update', $dado->id);
        } else {
            $route = route('reserva.store');
        }
    @endphp
    <form action= "{{ $route }}" method="post">

        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id"
            value="@if (!empty($dado->id)) {{ $dado->id }} @else{{ '' }} @endif"><br>


        <label for=""> Responsável da Reserva</label> <br>
        <input type="text" name="resp" class="form-control"
            value="@if (!empty($dado->resp)) {{ $dado->resp }}
     @elseif (!empty(old('resp'))) {{ old('resp') }} else{{ '' }} @endif">
        <br>

        <label for="">Telefone </label> <br>
        <input type="text" name="tel" class="form-control"
            value="@if (!empty($dado->tel)) {{ $dado->tel }}
     @elseif (!empty(old('tel'))) {{ old('tel') }} else{{ '' }} @endif">
        <br>

        <label for="">Data da reserva</label> <br>
        <input type="text" name="data" class="form-control"
            value="@if (!empty($dado->data)) {{ $dado->data }}
     @elseif (!empty(old('data'))) {{ old('data') }} else{{ '' }} @endif">
        <br>

        <label for="">Horário da reserva</label> <br>
        <input type="text" name="hora" class="form-control"
            value="@if (!empty($dado->hora)) {{ $dado->hora }}
     @elseif (!empty(old('hora'))) {{ old('hora') }} else{{ '' }} @endif">
        <br>

        <label for=""> Quantidade de pessoas </label>
        <input type="text" name="pss" class="form-control"
            value="@if (!empty($dado->pss)) {{ $dado->pss }}
     @elseif (!empty(old('pss'))) {{ old('pss') }} else{{ '' }} @endif">
        <br>


        <label for="">Escolha a Categoria</label><br>

        <select name="categoria_reserva_id" class="form-select">
            @foreach ($categoria_reservas as $item)
                <option value="{{ $item->id }}">{{ $item->nome }}</option>
            @endforeach
        </select>



        <button type="submit">Resevar</button>
        <button><a href="{{ url('reserva') }} ">Voltar</a></button>

    </form>
@stop
