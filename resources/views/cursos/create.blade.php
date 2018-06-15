@extends('layouts.adminlte')

@section('title', 'Curso')
@section('subtitle', 'cadastre um curso no sistema')

@section('content')
        <div class="form-horizontal ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crie um curso</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('cursos.store') }}" >
            {{ csrf_field() }}
              <div class="box-body">
                @include('cursos.__dados')
               
              </div>
              @include('cursos.__footer')
            </form>
        </div>
        </div>

@stop