@extends('layouts.adminlte')

@section('title', 'Aluno')
@section('subtitle', 'edite o aluno')

@section('content')
        <div class="form-horizontal ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edite o Aluno: {{$aluno->nome}} </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('alunos.update', $aluno->id) }}" >
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="aluno_id" value="{{$aluno->id}}">
            {{ csrf_field() }}
              <div class="box-body">
                @include('alunos.__dados')
               
              </div>
              @include('alunos.__footer')
            </form>
        </div>
        </div>

@stop