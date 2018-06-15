@extends('layouts.adminlte')

@section('title', 'Projetos')
@section('subtitle', 'listar todos')

@section('content')

    @include('__flash')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Projetos de pesquisa</h3>
            <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            @can('criar-projetos')
            <a href="{{route('projetos.create')}}">
                <button class="btn btn-success">
                    <i class="fa fa-plus"></i>
                    Novo
                </button>
            </a>
            @endcan
        </div>
        <!-- /.box-tools -->

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="projetos" class="table table-bordered table-striped  dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Ano de publicação</th>
                            <th>Orientador</th>
                            <th>Aluno</th>
                            <th>Área de Pesquisa</th>
                            <th>Opções</th>
                        </tr>
                    </thead>            
                    <tbody>            
                        @foreach($projetos as $projeto)
                            <tr>
                                <td> {{$projeto->titulo}} </td>
                                <td> {{$projeto->ano_publicacao}} </td>
                                <td> {{$projeto->orientador->nome}} </td>
                                <td> {{$projeto->aluno->nome}} </td>
                                <td> {{$projeto->area_pesquisa->descricao}} </td>

                                <td> 
                                    @can('editar-projetos')
                                    <a href="{{route('projetos.edit', $projeto)}}"><i class="fa fa-pencil"></i></a>
                                    @endcan
                                    @can('deletar-projetos')
                                    <a href="{{route('projetos.remove', $projeto)}}"><i class="fa fa-minus-circle text-red"></i></a>
                                    @endcan                                    
                                    <a href="{{route('projetos.displayFile', $projeto->arquivo)}}"><i class="fa fa-file-pdf-o"></i></a>
                                </td>                                
                            </tr>                         
                        @endforeach                                 
                    </tbody>
                </table> 
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- box-footer -->
    </div>
    <!-- /.box -->


@section('scripts')
    @component('component.dataTablePT_BR')
        @slot('identifier')
            #projetos
        @endslot
    @endcomponent
@endsection
@stop