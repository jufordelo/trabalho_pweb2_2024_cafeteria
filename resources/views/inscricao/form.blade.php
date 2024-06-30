@extends('base')
@section('conteudo')

<body style="background-color:rgb(222, 198, 245);" > </body>

   <h3>BREKIEE COFFEE <i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h3> <br>
    <h4>Faça sua Inscrição para concorrer prêmios abaixo:</h4>
    @php
        if (!empty($dado->id)) {
            $route = route('inscricao.update', $dado->id);
        } else {
            $route = route('inscricao.store');
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

        <label for="">Telefone</label> <br>
        <input type="text" name="telefone" class="form-control"
            value="@if (!empty($dado->telefone)) {{ $dado->telefone }}
     @elseif (!empty(old('telefone'))) {{ old('telefone') }} else{{ '' }} @endif">
        <br>


        <label for=""> Seu @ do Instagram </label>
        <input type="text" name="insta" class="form-control"
            value="@if (!empty($dado->insta)) {{ $dado->insta }}
     @elseif (!empty(old('insta'))) {{ old('insta') }} else{{ '' }} @endif">
        <br>


        <label for=""> Escolha o prêmio que deseja concorrer</label><br>
        <select name="categoria_inscricao_id" class="form-select">
            @foreach ($categoria_inscricaos as $item)
                <option value="{{ $item->id }}">{{ $item->nome }}</option>
            @endforeach
        </select> <br>

        @php
        $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.jpg';
        //dd($nome_imagem);
    @endphp
    <label for=""> Insira sua foto </label><br>
    <img src="/storage/{{ $nome_imagem }}" width="300px" alt="imagem" />
    <input type="file" name="imagem" class="form-control"
        value="@if (!empty($dado->imagem)) {{ $dado->imagem }}@elseif (!empty(old('imagem'))){{ old('imagem') }}@else{{ '' }} @endif"><br>




        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #B197FC;"></i>
Enviar</button>


        <button class="btn btn-dark"> <i class="fa-solid fa-rotate-left" style="color: #B197FC;"></i><a href="{{ url('inscricao') }} "></a>Voltar</a></button>

    </form>
@stop
