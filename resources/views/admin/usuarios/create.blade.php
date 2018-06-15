@extends('layouts.adminlte')

@section('title', 'Usuário')
@section('subtitle', 'cadastre um usuário no sistema')

@section('content')
        <div class="form-horizontal ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crie um Usuário</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('usuarios.store') }}" >
            {{ csrf_field() }}
              <div class="box-body">
                @include('admin.usuarios.__dados')
               
              </div>
              @include('admin.usuarios.__footer')
            </form>
        </div>
        </div>


@stop