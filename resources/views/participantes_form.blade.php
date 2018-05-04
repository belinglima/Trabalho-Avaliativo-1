@extends('modelo')



@section('conteudo')

<div class="container">

<div class="row">

@if ($errors->any())
    <div class="col-sm-12 alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="col-sm-11">
        <h2>{{$titulo}}</h2>
    </div>
    <div class="col-sm-1">
    <a href="{{ route('participantes.index')}}" 
    class="btn btn-success" role="button" style="margin-top:10px">Voltar</a>
    </div>
    </div>
</div>

<div class="container">

@if($acao == 1)
<form action="{{ route('participantes.store') }}" method="POST">
@elseif ($acao == 2)
<form action="{{ route('participantes.update', $participantes->id) }}" method="POST">
{!! method_field('PUT') !!}
@endif
{{ csrf_field() }}
  <div class="form-group">
    <label for="nome">Raça:</label>
    <input type="text" class="form-control" id="raca" name="raca"
    value="{{$participantes->raca or old('raca')}}">
  </div>
  
  <div class="form-group">
    <label for="marca">Proprietario:</label>
    <input type="text" class="form-control" id="proprietario" name="proprietario"
    value="{{$participantes->proprietario or old('proprietario')}}">
  </div>

  <div class="form-group">
    <label for="quant">Peso:</label>
    <input type="text" class="form-control" id="peso" name="peso"
    value="{{$participantes->peso or old('peso')}}">
  </div>
  
  <div class="form-group">
    <label for="preco">Valor R$:</label>
    <input type="text" class="form-control" id="valor" name="valor"
    value="{{$participantes->valor or old('valor')}}">
  </div>
@if($acao == 1 || $acao == 2)
  <button type="submit" class="btn btn-primary">Enviar</button>
  <button type="reset" class="btn btn-warning">Limpar</button>
@endif
</form>
</div>
@endsection