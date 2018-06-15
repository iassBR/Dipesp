@extends('layouts.adminlte')

@section('title', 'Papéis')
@section('subtitle', 'Lista de papéis do usuário') 

@section('content')

@include('__flash')
    <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Papéis no sistema</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>           
             </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="papeisSistema" class="table table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($papel as $valor)  
                        <form class="form-horizontal" action="{{route('user.papel.store',[$usuario->id,$valor->id])}}" method="post">
                            {{ csrf_field() }}
                            <tr>                          
                                <td>{{$valor->nome}}</td>
                                <td>{{$valor->descricao}}</td>
                                <td>                                    
                                    <button name="papel_id" type="submit" data-usuario="{{$usuario->id}}" data-papel="{{$valor->id}}" class="adiciona-papel btn btn-primary btn-xs"  value="{{$valor->id}}">Adicionar    
                                    </button>                                    
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>

              </table>
              <!-- @include('admin.usuarios.__Tfooter') -->
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
    </div>
       <div class="col-md-6">
          <div class="box">              
            <div class="box-header">
              <h3 class="box-title">Lista de Papéis para {{$usuario->name}}</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
           
             </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="papeisUser" class="table table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Papel</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($usuario->papeis as $papel)
                        <tr>
                            <td>{{ $papel->nome }}</td>
                            <td>{{ $papel->descricao }}</td>
                            <td>
                                <form action="{{route('user.papel.destroy',[$usuario->id,$papel->id])}}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button data-usuario="{{$usuario->id}}" data-papel="{{$valor->id}}"  class="deleta-papel btn btn-danger btn-xs">Apagar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

              </table>
                <!-- @include('admin.usuarios.__Tfooter') -->
             
            </div>
            <!-- /.box-body -->
        
          <!-- /.box -->
        </div>
    </div>


@section('scripts')
    @component('component.dataTablePT_BR')
        @slot('identifier')
            #papeisSistema
        @endslot
    @endcomponent

    @component('component.dataTablePT_BR')
        @slot('identifier')
            #papeisUser
        @endslot
    @endcomponent
<script>
    $('#papeisSistema').on('click', '.adiciona-papel', function(){
        var usuario_id = $(this).data('usuario');
        var papel_id = $(this).data('papel');
        // alert('usuario '+usuario_id+'papel '+papel_id);
        $.ajax({
            type: 'POST',
            url: '/user/papel/'+usuario_id+'/'+papel_id,
            
            success: function(data){
                location.reload();// = "/usuarios/papel/"+usuario_id;
            },
            error: function(data){
                alert(data.response);
            }
        });
    });

    $('#papeisUser').on('click', '.deleta-papel', function(){
        var usuario_id = $(this).data('usuario');
        var papel_id = $(this).data('papel');
        // alert('usuario '+usuario_id+'papel '+papel_id);
        $.ajax({
            type: 'POST',
            url: '/user/papel/'+usuario_id+'/'+papel_id,
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