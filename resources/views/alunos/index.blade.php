@extends('layouts.adminlte')

@section('title', 'Alunos')
@section('subtitle', 'alunos no sistema')

@section('content')

@include('__flash')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de alunos</h3>
                    <div class="box-tools pull-right" >
                        @can('criar-alunos')
                        <a class="btn btn-success" href="{{ route('alunos.create') }}" >
                            <i class="fa fa-plus"></i>
                            Novo 
                        </a>       
                        @endcan             
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="alunosIndex" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Matrícula</th>
                            <th>Curso</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody id="orientadores" >
                            @foreach($alunos as $aluno)
                                <tr class="aluno{{$aluno->id}}">
                                    <td>{{$aluno->nome}}</td>
                                    <td>{{$aluno->matricula}}</td>
                                    <td>{{$aluno->curso->nome}}</td>                                    
                                    <td>                                    
                                        @can('lista-alunos')    
                                        <a class="show-aluno btn btn-info btn-xs fa fa-eye"  data-id ="{{$aluno->id}}" data-nome="{{$aluno->nome}}" data-matricula="{{$aluno->matricula}}" data-curso="{{$aluno->curso->nome}}" > Vizualizar</a>
                                        @endcan
                                        @can('editar-alunos')
                                        <a class="btn btn-primary btn-xs fa fa-edit" href="{{ route('alunos.edit', $aluno->id) }}"  > Editar</a>
                                        @endcan
                                        @can('deletar-alunos')
                                        <a class="destroy-aluno btn btn-danger btn-xs fa fa-remove " data-id ="{{$aluno->id}}" data-nome="{{$aluno->nome}}" data-matricula="{{$aluno->matricula}}" data-curso="{{$aluno->curso->nome}}" > Remover</a>
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
            #alunosIndex
        @endslot
    @endcomponent
<script>
  

    // ----------------- destroy -----------------//
        $(document).on('click', '.destroy-aluno', function() {
            $('#footer_action_button').text(" Deletar");
            $('#footer_action_button').removeClass('atualiza');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('delete');
            $('.modal-title').text('Deletar o Aluno');
            $('.id').text($(this).data('id'));
            $('.actionBtn').show();
            $('.deleteContent').show();
            $('.form-horizontal').hide();
            $('.cursos').hide();
            $('.nome').html($(this).data('nome'));
            $('#modal').modal('show');
        });
    
        $('.modal-footer').on('click', '.delete', function(){
            
            $.ajax({
                type: 'POST',
                url: '/alunos/destroy/'+$('.id').text(),
                data: {
                    'id': $('.id').text(),
                    '_method' : 'DELETE'                
                },
                success: function(data){
                    $('.aluno'+$('.id').text()).remove();
                    location.reload();
                },
                erro: function(data){
                    alert(data.response);
                }
            });
        });
    // ----------------- show -----------------//
        $(document).on('click', '.show-aluno', function() {
            $('.modal-title').text('Aluno:  '+$(this).data("nome"));

            $('.actionBtn').hide();
            $('.deleteContent').hide();            
            $('.modalidade').hide();
            $('.email').hide();
            $('.descricao').hide();

            $('#nome').val($(this).data("nome"));
            $('#matricula').val($(this).data("matricula"));
            $('#curso').val($(this).data("curso"));

            $('.form-horizontal').show();
            $('.curso').show();
           
            $('#modal').modal('show');
        });
        
    </script>
@endsection

@stop