@extends('base')
@section('conteudo')

<body style="background-color:rgb(228, 226, 149);">
        <h3> FeedBacks e Sugestões</h3>
           <h6>Sua opinião é importante e ajuda nós a crescer cada dia mais!</h6>
        @php

           // dd($dado);
            if (!empty($dado->id)) {
                $route = route('sugestao.update', $dado->id);
            } else {
                $route = route('sugestao.store');
            }
        @endphp
        <form action="{{ $route }}" method="post">

            @csrf

            @if (!empty($dado->id))
                @method('put')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty($dado->id)) {{ $dado->id }} @else{{ '' }} @endif">

            <label for="">Assunto:</label>
            <input type="text" name="assunto" class="form-control"
                value="@if (!empty($dado->assunto)) {{ $dado->assunto }}
     @elseif (!empty(old('assunto'))) {{ old('assunto') }} else{{ '' }} @endif">

            <label for="">Tipo de atendimento:</label><br>
            <select name="tipo" class="form-select">
                @foreach ($categoria_sugestao as $item)
                    <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                @endforeach
            </select>

            <label for="">Comentário:</label> <br>

            <textarea name="comentario" cols="100" rows="5">@if (!empty($dado->comentario)){{ $dado->comentario }}@elseif (!empty(old('comentario'))){{ old('comentario') }} @else{{ '' }}@endif
            </textarea>

            <br>


            <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #00FF7F;"></i>
                Enviar</button>
          
        <a class="btn btn-dark" href="{{ url('sugestao') }} "><i class="fa-solid fa-rotate-left"
            style="color: #ff3d3d;"></i> Voltar</a>

        </form>
    @stop
