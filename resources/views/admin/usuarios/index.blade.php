@extends('layouts.adminlte')

@section('title', 'Usuários')
@section('subtitle', 'usuários no sistema')

@section('content')

@include('__flash')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de usuários</h3>
                    <div class="box-tools pull-right" >
                    @can('criar-usuarios')
                        <a class="btn btn-success" href="{{ route('usuarios.create') }}" >
                            <i class="fa fa-plus"></i>
                            Novo 
                        </a>     
                        @endcan               
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="usuariosIndex" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Opções</th>
                        </tr>
                        </thead>
                        <tbody id="usuarios" >
                            @foreach($usuarios as $usuario)
                                <tr class="usuario{{$usuario->id}}">
                                <td>{{ $usuario->name }}</td>
						        <td>{{ $usuario->email }}</td>                                   
                                    <td>
                                        @can('lista-usuarios')                                        
                                        <a class="show-user btn btn-info btn-xs fa fa-eye"  data-id ="{{$usuario->id}}" data-nome="{{$usuario->name}}" data-email="{{$usuario->email}}"   > Vizualizar</a>
                                        @endcan
                                        @can('editar-usuarios')
                                        <a class="btn btn-primary btn-xs fa fa-edit" href="{{ route('usuarios.edit', $usuario->id) }}"> Editar</a>
                                        @can('editar-papeis')
                                        <a  class="btn btn-default  btn-xs fa fa-sitemap" href="{{route('usuarios.papel',$usuario->id)}}"> Papel</a>
                                        @endcan
							            @endcan
                                        @can('deletar-usuarios')
                                        <a class="destroy-user btn btn-danger btn-xs fa fa-remove" data-id ="{{$usuario->id}}" data-nome="{{$usuario->name}}" data-email="{{$usuario->email}}"  > Remover</a>
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
            #usuariosIndex
        @endslot
    @endcomponent
<script>
  

    // ----------------- destroy -----------------//
        $(document).on('click', '.destroy-user', function() {
            $('#footer_action_button').text(" Deletar");
            $('#footer_action_button').removeClass('atualiza');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('delete');
            $('.modal-title').text('Deletar o Usuário');
            $('.id').text($(this).data('id'));
            $('.actionBtn').show();
            $('.deleteContent').show();
            $('.form-horizontal').hide();
            $('.cursos').hide();
            $('.nome').html($(this).data('nome'));
            //add email
            $('#modal').modal('show');
        });
    
        $('.modal-footer').on('click', '.delete', function(){
            
            $.ajax({
                type: 'POST',
                url: '/usuarios/destroy/'+$('.id').text(),
                data: {
                    'id': $('.id').text(),
                    '_method' : 'DELETE'                
                },
                success: function(data){
                    //$('.usuario'+$('.id').text()).remove();
                    location.reload();
                },
                error: function (response) {
                    var r = jQuery.parseJSON(response.responseText);
                    alert("" + r.message);

                }
            });
        });
    // ----------------- show -----------------//
        $(document).on('click', '.show-user', function() {
            $('.modal-title').text('Usuário:  '+$(this).data("nome"));

            $('.actionBtn').hide();
            $('.deleteContent').hide();            
            $('.modalidade').hide();
            $('.matricula').hide();
            $('.curso').hide();
            $('.email').hide();
            $('.descricao').hide();
            
            $('#nome').val($(this).data("nome"));
            $('#email').val($(this).data("email"));
            

            $('.form-horizontal').show();
            $('.email').show();
           
            $('#modal').modal('show');
        });
        $(function () {
            $('#usuariosIndex').DataTable()
        })
    </script>
@endsection

@stop