@extends('layouts.adminlte')

@section('title', 'Orientador')
@section('subtitle', 'edite o orientador')

@section('content')
        <div class="form-horizontal ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edite o Orientador: {{$orientador->nome}} </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('orientadores.update', $orientador->id) }}" >
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="orientador_id" value="{{$orientador->id}}">
            
            {{ csrf_field() }}
              <div class="box-body">
                @include('orientadores.__dados')
               
              </div>
              @include('orientadores.__footer')
            </form>
        </div>
        </div>

@stop