@extends('layouts.adminlte')

@section('title', 'Usuário')
@section('subtitle', 'edite o usuario')

@section('content')
        <div class="form-horizontal ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edite o Usuário: {{$usuario->name}} </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('usuarios.update', $usuario->id) }}" >
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="usuario_id" value="{{$usuario->id}}">
            
            {{ csrf_field() }}
              <div class="box-body">
                @include('admin.usuarios.__dados')
               
              </div>
              @include('admin.usuarios.__footer')
            </form>
        </div>
        </div>

@stop