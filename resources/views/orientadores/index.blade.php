@extends('layouts.adminlte')

@section('title', 'Orientadores')
@section('subtitle', 'orientadores no sistema')

@section('content')

@include('__flash')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de orientadores</h3>
                    <div class="box-tools pull-right"> 
                        @can('criar-orientadores')
                        <a class="btn btn-success" href="{{route('orientadores.create')}}">
                            <i class="fa fa-plus"></i>
                            Novo
                        </a>   
                        @endcan                 
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="orientadoresIndex" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Matrícula</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody id="orientadores" >
                            @foreach($orientadores as $orientador)
                                <tr class="orientador{{$orientador->id}}">
                                    <td>{{$orientador->nome}}</td>
                                    <td>{{$orientador->matricula}}</td>                                    
                                    <td>
                                        @can('lista-orientadores')
                                        <a class="show-orientador btn btn-info btn-xs fa fa-eye"  data-id ="{{$orientador->id}}" data-nome="{{$orientador->nome}}" data-matricula="{{$orientador->matricula}}" > Vizualizar</a>
                                        @endcan
                                        @can('editar-orientadores')
                                        <a class="btn btn-primary btn-xs fa fa-edit" href="{{route('orientadores.edit', $orientador->id)}}"> Editar</a>
                                        @endcan
                                        @can('deletar-orientadores')
                                        <a class="destroy-orientador btn btn-danger btn-xs fa fa-remove " data-id ="{{$orientador->id}}" data-nome="{{$orientador->nome}}" data-matricula="{{$orientador->matricula}}"> Remover</a>
                                        @endcan
                                    </td>                                
                                </tr>                         
                            @endforeach      
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

   



@section('scripts')
    @component('component.dataTablePT_BR')
        @slot('identifier')
            #orientadoresIndex
        @endslot
    @endcomponent

<script>
    

// ----------------- destroy -----------------//
    $(document).on('click', '.destroy-orientador', function() {
        $('#footer_action_button').text(" Deletar");
        $('#footer_action_button').removeClass('atualiza');
        $('.actionBtn').show();
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Deletar o Orientador');
        $('.id').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.cursos').hide();
        $('.nome').html($(this).data('nome'));
        $('#modal').modal('show');
    });

    $('.modal-footer').on('click', '.delete', function(){        
        $.ajax({
            type: 'POST',
            url: '/orientadores/destroy/'+$('.id').text(),
            data: {
                'id': $('.id').text(),
                '_method' : 'DELETE'                
            },
            success: function(data){
                //var success = $.parseJSON(data.responseText);
                //alert(data.responseText);
                location.reload();
            },
            error: function(data){
                console.log(data.response);
            }
        });
    });
// ----------------- show -----------------//
    $(document).on('click', '.show-orientador', function() {
        $('.actionBtn').hide();
        $('.deleteContent').hide();
        $('.curso').hide();
        $('.modalidade').hide();
        $('.cursos').hide();
        $('.email').hide();
        $('.descricao').hide();

        $('#nome').val($(this).data("nome"));
        $('#matricula').val($(this).data("matricula"));
        $('.modal-title').text('Orientador:  '+$(this).data("nome"));

        $('.form-horizontal').show();     
        $('#modal').modal('show');      
    });
    
   
</script>



@endsection
@stop