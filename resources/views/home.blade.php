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
                        <form  method="POST"  action="{{ route('home.busca') }}" enctype="multipart/form-data">
                            @include('projetos.busca.__form')
                            
                            <div class="col-lg-12 col-lg-offset-10">
                                <button name="action" value="busca" type="submit" class="btn btn-default">Filtrar</button>
                                @can('lista-projetos')
                                    <button name="action" value="relatorio" type="submit" href="" class="btn btn-primary">
                                    Relatório</button> 
                                @endcan                               
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

    <script>

        $("#filtrar").click( function(){
            alert("clicou");
            // console.log( $("#form").serialize() );
            $.ajax({
                type: 'POST',
                url: 'home/busca',
                data: {

                },
                success: function(projetos){
                    for(var i in projetos){
                        console.log(projetos[i].titulo);
                    }
                },
                error: function(data){
                    alert("erro "+data.responseJSON);
                }

            });
        });

    </script>


    @component('component.dataTablePT_BR')
        @slot('identifier')
            #projetos
        @endslot
    @endcomponent
@endsection

@stop