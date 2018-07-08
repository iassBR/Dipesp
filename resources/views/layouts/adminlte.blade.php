
    <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <title>{{ config('app.name')}}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">    
    
   
    {{--  default css  --}}
    <link rel="stylesheet" href="{{ asset('css/app.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js does not work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{--  Google Font  --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-green sidebar-mini {{ Auth::check() ? '' :  'sidebar-collapse' }} ">
    <!-- Site wrapper -->
    <div class="wrapper">

    <header class="main-header">
    <!-- Logo -->
    <a href="{{route('home')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>DPSP</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>DIPESP</b></span>
    </a>
    
    {{--  ===============================================  --}}

        @include('layouts.__navbar')

    {{--  ===============================================  --}}

        @include('layouts.__sidebar'),

    {{--  ===============================================  --}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        @yield('title')
        <small>@yield('subtitle')</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    {{--  ===============================================  --}}

    @include('layouts.__footer')

    {{--  ===============================================  --}}

   
   <script src="{{ asset('js/app.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree()
        })
    </script>

    <!-- Ajax setup -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });

        $(document).ready(function(){        
            $("#sucesso").fadeOut(5000);
            $("#erro").fadeOut(5000); 
        });
    </script>

    <!-- Modais -->
    {{-- Modal Form Create  --}}
    
    <div class="modal fade" id="create" role="dialog" >
        <div class="modal-dialog" >
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="false">&times;</span></button>
              <h4 class="modal-title" id="createModalLabel"></h4>
            </div>
            <div class="modal-body">
                 <!-- menssagem de erro aqui -->
                 <div id="errors" class="margin-top-20">
                 
                 </div>

              <form class="form-horizontal" role="form">    

                <div class="form-group">
                  <label  class="control-label col-sm-2">Nome:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nomeCreate" id="nomeCreate" value="{{old('nomeCreate')}}" required>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="control-label col-sm-2">Matricula:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="matriculaCreate" id="matriculaCreate"  required>
                  </div>
                </div>

                <div class="curso_id form-group">
                    <label class="control-label col-sm-2" for="curso_idCreate">Curso</label>
                    <div class="col-sm-8">
                        <select id="curso_idCreate" class="form-control" name="curso_idCreate">                                          
                                         
                        </select>
                    </div>
                </div>

              </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
              <button id="add"  type="submit" class="btn btn-primary">Cadastrar</button>
              
            </div>
          </div>
        </div>
      </div>


    
    
    {{-- Modal Form Edit, Show and Delete Post --}}
    <div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
           

            <!-- Hide-Show form-horizontal -->
            <form class="form-horizontal" role="modal">
                <input type="hidden" class="form-control" name="id" id="id" disabled>
                <!-- Nome -->
                <div class="form-group">
                    <label class="control-label col-sm-2" >Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome" disabled>
                    </div>
                </div>
                <!-- Email -->
                <div class="email form-group">
                    <label class="control-label col-sm-2" >Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" disabled>
                    </div>
                </div>
                <!-- Descrição -->
                <div class="descricao form-group">
                    <label class="control-label col-sm-2" >Descrição</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="descricao" disabled>
                    </div>
                </div>
                 <!-- Matricula -->
                <div class="matricula form-group">
                    <label class="control-label col-sm-2"for="matricula">Matricula</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="matricula" disabled>
                    </div>
                </div>
                <!-- Curso -->
                <div class="curso form-group">
                    <label class="control-label col-sm-2" for="curso">Curso</label>
                    <div class="col-sm-10">
                        <input id="curso" class="form-control" name="curso" disabled>                                        
                    </div>
                </div>
                <!-- Modalidade -->
                 <div class="modalidade form-group">
                    <label class="control-label col-sm-2" for="modalidade">Modalidade</label>
                    <div class="col-sm-10">
                        <input id="modalidade"  class="form-control" name="modalidade" disabled >                                      
                    </div>                   
                </div>
                

            </form>
        
        {{-- Form Delete Post --}}
        <div class="deleteContent">
          Você realmente deseja remover  <strong><span class="nome"></span></strong>?
          <span class="hidden id"></span>
        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="fa fa-check"> </span>
        </button>

        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="fa fa-remove"></span> Fechar
        </button>

      </div>
    </div>
  </div>
</div>


      <script>
        
        //antes de submeter os filtros
        $(document).on('click', '#ano_publicacao', function(){
         
            $("#ano_publicacao").change(function(){
                var id = $("#ano_publicacao").val();

                var anoFim= jQuery('#ano_fim');
                var anoInicio = jQuery('#ano_inicio');
                // se a data estiver selecionada, bloquear o campo entre datas
                if(id != ''){
                    anoInicio.prop("disabled", true);
                    anoFim.prop("disabled", true);

                    anoFim.val(0);
                    anoInicio.val(0);
                }else{
                    anoInicio.removeAttr("disabled");
                    anoFim.removeAttr("disabled");
                }
            });
        });
        //quando a página recarregar após a requisição
        $(document).ready( function(){
            var id = $("#ano_publicacao").val();

            var anoFim= jQuery('#ano_fim');
            var anoInicio = jQuery('#ano_inicio');
            // se a data estiver selecionada, bloquear o campo entre datas
            if(id != ''){
                anoInicio.prop("disabled", true);
                anoFim.prop("disabled", true);

                anoFim.val(0);
                anoInicio.val(0);
            }else{
                anoInicio.removeAttr("disabled");
                anoFim.removeAttr("disabled");
            }

        });
        
    </script>

    @yield('scripts')



</body>
</html>
