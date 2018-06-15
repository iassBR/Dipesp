@extends('layouts.adminlte')

@section('title', 'Projetos')
@section('subtitle', "Editar projeto: $projeto->titulo")

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Edite o projeto</h3></div>
            <div class="panel-body">
                <form method="post" action="{{ route('projetos.update', $projeto) }}" enctype="multipart/form-data"> 
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="previous" value="{{ $previous }}">
                    @include("projetos.__form")

                    <div class="col-lg-12 col-lg-offset-10">
                        <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection