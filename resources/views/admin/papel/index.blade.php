@extends('layouts.adminlte')

@section('title', 'Papéis')
@section('subtitle', 'papéis no sistema')

@section('content')

@include('__flash')


<section class="content">
      <div class="row">
        <div class="col-xs-12"> 
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de papéis</h3>
                    <div class="box-tools pull-right" >
                        @can('criar-papeis')
                        <a class="btn btn-success" href="{{ route('papeis.create') }}" >
                            <i class="fa fa-plus"></i>
                            Novo 
                        </a>         
                        @endcan           
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="papeisIndex" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Opções</th>
                        </tr>
                        </thead>
                        <tbody id="papeis" >
                            @foreach($papeis as $papel)
                                <tr>
                                    <td>{{ $papel->nome }}</td>
                                    <td>{{ $papel->descricao }}</td>
                                    <td>
                                            @can('lista-papeis')                                        
                                            <a class="show-papel btn btn-info btn-xs fa fa-eye" data-nome="{{$papel->nome}}" data-descricao="{{$papel->descricao}}" > Vizualizar</a>
                                            @endcan
                                            @can('editar-papeis')
                                            <a  class="btn btn-primary btn-xs fa fa-edit" data-nome="{{$papel->nome}}" data-descricao="{{$papel->descricao}}" href="{{ route('papeis.edit',$papel->id) }}">Editar</a>
                                            <a  class="btn btn-default  btn-xs fa fa-sitemap" href="{{route('papeis.permissao',$papel->id)}}">Permissões</a>
                                            @endcan
                                            @can('deletar-papeis')
                                               
                                                <button data-nome="{{$papel->nome}}" data-id="{{ $papel->id }}" class="destroy-papel btn btn btn-danger btn-xs fa fa-remove"> Remover</button>
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
            #papeisIndex
        @endslot
    @endcomponent
<script>
  

    // ----------------- destroy -----------------//
        $(document).on('click', '.destroy-papel', function() {
            $('#footer_action_button').text(" Deletar");
            $('#footer_action_button').removeClass('atualiza');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('delete');
            $('.modal-title').text('Deletar o Papel');
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
                url: '/papeis/destroy/'+$('.id').text(),
                data: {
                    'id': $('.id').text(),
                    '_method' : 'DELETE'                
                },
                success: function(data){
                    // $('.papel'+$('.id').text()).remove();
                    location.reload();
                },
                error: function (response) {
                    var r = jQuery.parseJSON(response.responseText);
                    alert("" + r.message);

                }
            });
        });
    // ----------------- show -----------------//
        $(document).on('click', '.show-papel', function() {
            $('.modal-title').text('Papel:  '+$(this).data("nome"));

            $('.actionBtn').hide();
            $('.deleteContent').hide();            
            $('.modalidade').hide();
            $('.matricula').hide();
            $('.curso').hide();
            $('.email').hide();
            
            $('.descricao').show();
            $('#nome').val($(this).data("nome"));
            $('#descricao').val($(this).data("descricao"));
            

            $('.form-horizontal').show();
            
           
            $('#modal').modal('show');
        });
        $(function () {
            $('#papeisIndex').DataTable()
        })
    </script>
@endsection



@stop