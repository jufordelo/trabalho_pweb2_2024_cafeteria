@extends('base')
@section('conteudo')
<body style="background-color:rgb(228, 226, 149);">

    <h4>Faça sua Reserva abaixo:</h4>
      <h5> Reservas de mesas, local e área externa!</h5>
     
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
        

        <label for=""> Seu Telefone:</label> <br>
        <input type="text" name="tel" class="form-control"
            value="@if (!empty($dado->tel)) {{ $dado->tel }}
     @elseif (!empty(old('tel'))) {{ old('tel') }} else{{ '' }} @endif">
        

        <label for=""> Insira a data que deseja reservar:</label> <br>
        <input type="text" name="data" class="form-control"
            value="@if (!empty($dado->data)) {{ $dado->data }}
     @elseif (!empty(old('data'))) {{ old('data') }} else{{ '' }} @endif">
     

        <label for="">Horário da reserva</label> <br>
        <input type="text" name="hora" class="form-control"
            value="@if (!empty($dado->hora)) {{ $dado->hora }}
     @elseif (!empty(old('hora'))) {{ old('hora') }} else{{ '' }} @endif">
      
        <label for=""> Quantidade de pessoas presentes: </label>
        <input type="text" name="pss" class="form-control"
            value="@if (!empty($dado->pss)) {{ $dado->pss }}
     @elseif (!empty(old('pss'))) {{ old('pss') }} else{{ '' }} @endif">
       
        <label for=""> Escolha uma opção: </label><br>
        <select name="categoria_reservas_id" class="form-select">
            @foreach ($categoria_reservas as $item)
                <option value="{{ $item->id }}">{{ $item->nome }}</option>
            @endforeach
        </select>
 <em> Enviaremos uma mensagem no número cadastrado para mais informações! </em>
  <br>
        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #00FF7F;"></i>
            Enviar</button>

        <a class="btn btn-dark" href="{{ url('reserva') }} "><i class="fa-solid fa-rotate-left"
            style="color: #ff3d3d;"></i> Voltar</a>

    </form>
@stop
