@extends('base')
@section('conteudo')

<h3>Faça seu Pedido de Festa abaixo:</h3>
@php
    if(!empty($dado->id)){

    $route= route('encomenda.update',$dado->id);
    }else{
      $route = route('encomenda.store');
    }
@endphp
<form action= "{{$route}}" method="post">

    @csrf

    @if (!empty($dado->id))
    @method('put')

    @endif

    <input type="hidden" name="id"
    value="@if (!empty($dado->id)) {{$dado->id}} @else{{''}} @endif"><br>


    <label for="">Nome</label> <br>
    <input type="text" name="nome"  class="form-control"
     value="@if(!empty ($dado->nome)){{$dado->nome}}
     @elseif (!empty(old ('nome'))) {{old('nome')}} else{{""}} @endif"> <br>

    <label for="">Contato</label> <br>
     <input type="text" name="contato"  class="form-control"
     value="@if(!empty ($dado->contato)){{$dado->contato}}
     @elseif (!empty(old ('contato'))) {{old('contato')}} else{{""}} @endif"> <br>


    <label for="">Quantidade</label>
    <input type="text" name="qnt"  class="form-control"
     value="@if(!empty ($dado->qnt)){{$dado->qnt}}
     @elseif (!empty(old ('qnt'))) {{old('qnt')}} else{{""}} @endif"> <br>


<label for="">Categorias</label><br>

     <select name="categoria_id" class="form-select">
        @foreach ($categorias as $item )
<option value="{{$item->id}}">{{$item->nome}}</option>
        @endforeach
     </select>



    <button type="submit" >Enviar</button>
    <button><a href="{{url('encomenda')}} ">Voltar</a></button>

</form>
@stop







