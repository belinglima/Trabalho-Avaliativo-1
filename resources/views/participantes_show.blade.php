@extends('modelo')



@section('conteudo')

<div class="container">

<div class="row">
    <div class="col-sm-6">
        <h2>Lista de Participantes</h2>
    </div>
    <div class="col-sm-5">
     <div class="form-group input-group">
      <form class="form-inline" action="{{ route('participantes.search') }}" method="POST" style="margin-top:10px">
            {{ csrf_field() }}
             <input type="text" class="form-control" name="search" id="search" placeholder="Buscar">
             <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Search</button>
        </form>
     </div>

    </div>
    <div class="col-sm-1">
    <a href="{{ route('participantes.create')}}" class="btn btn-success" role="button" style="margin-top:10px">Novo</a>
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
        <th>Raça</th>
        <th>Proprietario</th>
        <th>Peso.</th>
        <th>Valor R$</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>

@forelse ($participantes as $p)
    <tr>
    <td>{{$p->raca}}</td>
    <td>{{$p->proprietario}}</td>
    <td>{{$p->peso}}</td>
    <td>{{number_format($p->valor, 2, ',','.') }}</td>
    <td>

        <a href="{{ route('participantes.show', $p->id) }}" class="btn btn-success">Consultar</a>
         <a href="{{ route('participantes.edit', $p->id) }}" class="btn btn-warning">Editar</a> 

        <form style="display: inline-block;" method="POST" action="{{ route('participantes.destroy', $p->id) }}" 
        onsubmit="return confirm('Confirma Exclusão ?')">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}
        <button type="submit" class="btn btn-danger">Excluir</button>
        </form>

    </td>
    <td></td>
@empty
    <tr>
        <td colspan=5> Não a Participantes cadastrados ou a palavra pesquisada !</td>
    </tr>
@endforelse
    </tbody>
  </table>
</div>

@endsection