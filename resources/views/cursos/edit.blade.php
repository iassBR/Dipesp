@extends('layouts.adminlte')

@section('title', 'Curso')
@section('subtitle', 'edite o curso')

@section('content')
        <div class="form-horizontal ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edite o Curso: {{$curso->nome}} </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('cursos.update', $curso->id) }}" >
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
              <div class="box-body">
                @include('cursos.__dados')
               
              </div>
              @include('cursos.__footer')
            </form>
        </div>
        </div>

@stop