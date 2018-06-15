@extends('layouts.adminlte')

@section('title', 'Papel')
@section('subtitle', 'edite od papel ')

@section('content')
        <div class="form-horizontal ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edite o papel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('papeis.update', $papel->id) }}" >
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
              <div class="box-body">
                @include('admin.papel.__dados')
               
              </div>
              @include('admin.papel.__footer')
            </form>
        </div>
        </div>


@stop