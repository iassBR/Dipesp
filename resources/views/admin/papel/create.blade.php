@extends('layouts.adminlte')

@section('title', 'Papel')
@section('subtitle', 'cadastre um papel no sistema')

@section('content')
        <div class="form-horizontal ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crie um Papel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('papeis.store') }}" >
            {{ csrf_field() }}
              <div class="box-body">
                @include('admin.papel.__dados')
               
              </div>
              @include('admin.papel.__footer')
            </form>
        </div>
        </div>


@stop