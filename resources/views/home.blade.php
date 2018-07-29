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
                                    <button id="show-modal-relatorio" type="button"  class=" btn btn-primary">
                                    Relatório
                                    </button> 
                                @endcan                               
                            </div>

                            <div id="geraRelatorio" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"   >
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" >Gerar Relatório</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label>Informe a descrição do relatório</label>
                                            <input  class="form-control descricao" name="descricao" type="text" placeholder="Descrição do relatório" />
                                        </div>
                                        <div class="modal-footer">
                                            <button name="action" value="relatorio" type="submit" href="" class="btn_submit btn btn-primary">
                                            Gerar relatório
                                            </button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
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
        $("#show-modal-relatorio").click(function(){
            $('.descricao').val('');
            $('#geraRelatorio').modal('show');
            
        });

        $("#geraRelatorio").on('click', '.btn_submit', function(){
            $('#geraRelatorio').modal('hide');
        });

    </script>


    @component('component.dataTablePT_BR')
        @slot('identifier')
            #projetos
        @endslot
    @endcomponent
@endsection

@stop