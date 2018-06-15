@extends('layouts.adminlte')

@section('title', 'Permissões')
@section('subtitle', '') 

@section('content')

@include('__flash')
    <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Permissões no sistema</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
           
             </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="permissoesSistema" class="table table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($permissoes as $permissao)  
                        <form class="form-horizontal" action="{{route('papeis.permissao.store',[$papel->id,$permissao->id])}}" method="post">
                            {{ csrf_field() }}
                            <tr>                          
                                <td>{{$permissao->nome}}</td>
                                <td>{{$permissao->descricao}}</td>
                                <td>                                    
                                    <button name="permissao_id" data-permissao="{{$permissao->id}}"  data-papel="{{ $papel->id }}"  class="adiciona-permissao btn btn-primary btn-xs"  value="{{$permissao->id}}">Adicionar    
                                    </button>                                    
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>

              </table>
              <!-- @include('admin.papel.__Tfooter') -->
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
    </div>
       <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Permissões para {{$papel->nome}}</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
           
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="permissoesUser" class="table table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Permissão</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($papel->permissoes as $permissao)
                        <tr>
                            <td>{{ $permissao->nome }}</td>
                            <td>{{ $permissao->descricao }}</td>
                            <td>
                                <form action="{{route('papeis.permissao.destroy',[$papel->id,$permissao->id])}}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button  data-permissao="{{$permissao->id}}"  data-papel="{{ $papel->id }}"  class="deleta-permissao btn btn-danger btn-xs">Apagar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

              </table>
              <!-- @include('admin.papel.__Tfooter') -->
            </div>
            <!-- /.box-body -->
        
          <!-- /.box -->
        </div>
    </div>


@section('scripts')
    @component('component.dataTablePT_BR')
        @slot('identifier')
            #permissoesSistema
        @endslot
    @endcomponent

    @component('component.dataTablePT_BR')
        @slot('identifier')
            #permissoesUser
        @endslot
    @endcomponent
<script>
    $('#permissoesSistema').on('click', '.adiciona-permissao', function(){
        var permissao_id = $(this).data('permissao');
        var papel_id = $(this).data('papel');
        // alert('usuario '+usuario_id+'papel '+papel_id);
        $.ajax({
            type: 'POST',
            url: '/papeis/permissao/'+papel_id+'/'+permissao_id,
            
            success: function(data){
                location.reload();// = "/usuarios/papel/"+usuario_id;
            },
            error: function(data){
                alert(data.response);
            }
        });
    });

    $('#permissoesUser').on('click', '.deleta-permissao', function(){
        var permissao_id = $(this).data('permissao');
        var papel_id = $(this).data('papel');
        // alert('usuario '+usuario_id+'papel '+papel_id);
        $.ajax({
            type: 'POST',
            url: '/papeis/permissao/'+papel_id+'/'+permissao_id,
            data:{
                '_method' : 'DELETE'   
            },
            success: function(data){
               location.reload();// = "/usuarios/papel/"+usuario_id;
            },
            error: function(data){
                alert(data.response);
            }
        });
    });
  
</script>
@endsection



@stop