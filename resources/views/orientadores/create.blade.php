@extends('layouts.adminlte')

@section('title', 'Orientador')
@section('subtitle', 'cadastre um orientador no sistema')

@section('content')
        <div class="form-horizontal">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crie um Orientador</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('orientadores.store') }}" >
            {{ csrf_field() }}
              <div class="box-body">
                @include('orientadores.__dados')
               
              </div>
              @include('orientadores.__footer')
            </form>
        </div>
        </div>

@stop