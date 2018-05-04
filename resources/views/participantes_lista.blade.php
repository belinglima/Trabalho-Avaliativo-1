@extends('modelo')



@section('conteudo')

<div class="container">

<div class="row">
    <div class="col-sm-11">
        <h2>Lista de Produtos Cadastrados</h2>
    </div>
    <div class="col-sm-1">
    <a href="{{ route('produtos.create')}}" 
    class="btn btn-success" role="button" style="margin-top:10px">Novo</a>
    </div>
    </div>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

    <table class="table table-striped">
    <thead>
      <tr>
        <th>Descrição</th>
        <th>Marca</th>
        <th>Quant.</th>
        <th>Preço R$</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
   @foreach ($produtos as $p)
    <tr>
    <td>{{$p->nome}}</td>
    <td>{{$p->marca}}</td>
    <td>{{$p->quant}}</td>
    <td>{{number_format($p->preco, 2, ',','.') }}</td>
    <td><a href="{{ route('produtos.show', $p->id) }}" class="btn btn-success">Consultar</a> |
        <a href="{{ route('produtos.edit', $p->id) }}" class="btn btn-warning">Editar</a> | 
        <a href="{{ route('produtos.destroy', $p->id) }}" class="btn btn-danger">Apagar</a></td>
   @endforeach  
    </tbody>
  </table>
</div>
@endsection