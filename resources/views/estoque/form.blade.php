@extends('base')
@section('conteudo')

<body style="background-color:rgb(228, 226, 149);">

        <h4> 📝Cadastro de Produtos em Estoque </h4>
        @php

           // dd($dado);
            if (!empty($dado->id)) {
                $route = route('estoque.update', $dado->id);
            } else {
                $route = route('estoque.store');
            }
        @endphp
        <form action="{{ $route }}" method="post" enctype="multipart/form-data">

            @csrf

            @if (!empty($dado->id))
                @method('put')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty($dado->id)) {{ $dado->id }} @else{{ '' }} @endif">


            <label for=""> Nome do Produto </label> 
            <input type="text" name="mprima" class="form-control"
                value="@if (!empty($dado->mprima)) {{ $dado->mprima }}
     @elseif (!empty(old('mprima'))) {{ old('mprima') }} else{{ '' }} @endif">
        

            <label for="">Tipo do produto</label>
            <select name="tipo" class="form-select">
                @foreach ($categoria_estoque as $item)
                    <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                @endforeach
            </select>

            <label for="">Insira a Validade </label> 
            <input type="text" name="validade" class="form-control"
                value="@if (!empty($dado->validade)) {{ $dado->validade }}
     @elseif (!empty(old('validade'))) {{ old('validade') }} else{{ '' }} @endif">
            

            <label for=""> Quantidade do estoque</label> 
            <input type="text" name="quantidade" class="form-control"
                value="@if (!empty($dado->quantidade)) {{ $dado->quantidade }}
     @elseif (!empty(old('quantidade'))) {{ old('quantidade') }} else{{ '' }} @endif">
           

            @php
            $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.jpg';
            //dd($nome_imagem);
        @endphp
        <label for=""></label>
        <img src="/storage/{{ $nome_imagem }}" width="300px" alt="" />
        <input type="file" name="imagem" class="form-control"
            value="@if (!empty($dado->imagem)) {{ $dado->imagem }}@elseif (!empty(old('imagem'))){{ old('imagem') }}@else{{ '' }} @endif"><br>


            <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #00FF7F;"></i>
                Salvar</button>
    
        <a class="btn btn-dark" href="{{ url('estoque') }} "><i class="fa-solid fa-rotate-left"
            style="color: #ff3d3d;"></i> Voltar</a>

        </form>
    @stop
