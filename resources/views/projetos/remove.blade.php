@extends('layouts.adminlte')

@section('title', 'Projetos')
@section('subtitle', "Deseja remover o projeto \"$projeto->titulo\"")

@section('content')

@if($errors->any())
	<div class="alert alert-danger" role="alert">
		@foreach ($errors->all() as $error)
			{{ $error }}<br>
		@endforeach
	</div>
@endif

<div class="panel panel-default">
      <div class="panel-heading"><h3>Remover o projeto</h3> </div>
		<div class="panel-body">
			<form method="post" action="{{route ('projetos.destroy', $projeto)}}">
            <input type="hidden" name="_method" value="DELETE">
			<input type="hidden" name="previous" value="{{ $previous }}">
            {{ csrf_field() }}
				<div class="row">
					<div class="col-md-12">
						<h4>Tem certeza que deseja remover o projeto?</h4>
						<hr>
						<h4>Sobre o projeto</h4>
						<p>Título: {{ $projeto->titulo}}</p>
						<p>Data Publicação:  {{ $projeto->ano_publicacao}}</p>
						<p>Aluno: {{ $projeto->aluno->nome}}</p>
						<p>Orientador: {{ $projeto->orientador->nome}}</p>
						<p>Area de Pesquisa: {{ $projeto->area_pesquisa->nome  }}</p>
					</div>
				</div>
				<button type="submit" class="btn btn-danger">Remover</button>
				<a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
			</form>
		</div>
	</div>
</div>
@endsection