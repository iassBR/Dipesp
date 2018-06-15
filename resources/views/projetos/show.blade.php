@extends('layout.adminlte')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Detalhes do projeto</div>
        <div class="panel-body">  
            <div class="row">
                <div class="col-md-12">
                   <h4>Sobre o projeto</h4>
                        <p>Título: {{$projeto->titulo}}</p>
                        <p>Data Publicação:  {{$projeto->data_publicacao}}</p>
                        <p>Aluno: {{$projeto->aluno->nome}}</p>
                        <p>Orientador: {{$projeto->orientador->nome}}</p>
                        <p>Area de Pesquisa: {{$projeto->areaPesquisa->descricao}}</p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
@endsection