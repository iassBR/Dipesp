@extends('layouts.adminlte')

@section('title', 'Cursos')
@section('subtitle', 'cursos no sistema')

@section('content')

@include('__flash')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de cursos</h3>
                    <div class="box-tools pull-right" > 
                    @can('criar-cursos')
                        <a class="btn btn-success" href="{{ route('cursos.create') }}" >
                            <i class="fa fa-plus"></i>
                            Novo
                        </a>   
                    @endcan                 
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="cursosIndex" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Modalidade</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody id="cursos" >
                            @foreach($cursos as $curso)
                                <tr class="curso{{$curso->id}}">
                                    <td>{{$curso->nome}}</td>
                                    <td>{{$curso->modalidade->tipo}}</td>
                                                                   
                                    <td>                                        
                                        @can('lista-cursos')
                                        <a class="show-curso btn btn-info btn-xs fa fa-eye"  data-id ="{{$curso->id}}" data-nome="{{$curso->nome}}" data-modalidade="{{$curso->modalidade->tipo}}" > Vizualizar</a>
                                        @endcan
                                        @can('editar-cursos')
                                        <a class="btn btn-primary btn-xs fa fa-edit" href="{{ route('cursos.edit', $curso->id) }}"  > Editar</a>
                                        @endcan
                                        @can('deletar-cursos')
                                        <a class="destroy-curso btn btn-danger btn-xs fa fa-remove " data-id ="{{$curso->id}}" data-nome="{{$curso->nome}}"  data-modalidade="{{$curso->modalidade->tipo}}" > Remover</a>
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
            #cursosIndex
        @endslot
    @endcomponent
<script>
    
    
    // ----------------- destroy -----------------//
        $(document).on('click', '.destroy-curso', function() {
            $('#footer_action_button').text("Deletar");
            $('.modal-title').text('Deletar o Curso');

            $('#footer_action_button').removeClass('atualiza');
            $('.actionBtn').removeClass('btn-success');

            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('delete');
            
            $('.form-horizontal').hide();
            
            
            $('.id').text($(this).data('id'));
            $('.nome').html($(this).data('nome'));          
           
            $('.deleteContent').show();
            $('.actionBtn').show();
            $('#modal').modal('show');
        });
    
        $('.modal-footer').on('click', '.delete', function(){
            
            $.ajax({
                type: 'POST',
                url: '/cursos/destroy/'+$('.id').text(),
                data: {
                    'id': $('.id').text(),
                    '_method' : 'DELETE'                
                },
                success: function(aluno){
                    location.reload();
                },
                erro: function(data){
                    alert(data.response);
                }
            });
        });
    // ----------------- show -----------------//
        $(document).on('click', '.show-curso', function() {
            $('.modal-title').text('Curso:  '+$(this).data("nome"));
            $('.actionBtn').hide();
            $('.deleteContent').hide();
            $('.matricula').hide();
            $('.curso').hide(); 
            $('.email').hide();
            $('.descricao').hide();           

            $('#nome').val($(this).data("nome"));
            $('#modalidade').val($(this).data("modalidade"));
          
            
            $('.modalidade').show();
            $('.form-horizontal').show();
            
            $('#modal').modal('show');
        });
        $(function () {
            $('#CursosIndex').DataTable()
        })
    </script>
@endsection

@stop