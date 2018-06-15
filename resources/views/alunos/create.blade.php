@extends('layouts.adminlte')

@section('title', 'Aluno')
@section('subtitle', 'cadastre um aluno no sistema')

@section('content')
        <div class="form-horizontal ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crie um Aluno</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="POST" action="{{ route('alunos.store') }}" >
            {{ csrf_field() }}
              <div class="box-body">
                @include('alunos.__dados')
               
              </div>
              @include('alunos.__footer')
            </form>
        </div>
        </div>


@stop