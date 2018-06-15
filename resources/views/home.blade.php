@extends('layouts.adminlte')

@section('title', 'Projetos PIBICT')
@section('subtitle', '')

@section('content')
@include('__flash')
<div class="row">
    
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtros</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fa fa-minus"></i></button>           
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form method="post" action="{{route('busca.resultado')}}" enctype="multipart/form-data">
                            @include('projetos.busca.__form')
                            
                            <div class="col-lg-12 col-lg-offset-11">
                                <button type="submit" class="btn btn-success">Filtrar</button>
                            </div>
                        </form>
                    </div>            
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

        @include('projetos.busca.__tabela')
    </div>

@section('scripts')
    @component('component.dataTablePT_BR')
        @slot('identifier')
            #projetos
        @endslot
    @endcomponent
@endsection
@stop