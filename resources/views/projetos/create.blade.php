@extends('layouts.adminlte')

@section('title', 'Projetos')
@section('subtitle', 'Criar novo projeto de pesquisa')

@section('content')
    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Adicionar novo projeto</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <form method="post" action="{{route('projetos.store')}}" enctype="multipart/form-data">
                @include('projetos.__form')
                
                <div class="col-lg-12 col-lg-offset-10">
                    <a href="{{ route('projetos.index') }}" class="btn btn-info">Voltar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection
@section('scripts')
<script>
    // ---------------- store ORIENTADOR ------------------- //
    $(document).on('click', '.add-orientador', function() {
        $('.modal-title').text('Cadastre um Orientador');
        $('.curso_id').hide();
        $('#errors').hide();

        $('#add').removeClass('store-aluno');
        $('#add').addClass('store-orientador');
        
        $('#create').modal('show');
    });

    
    $(document).on('click','.store-orientador', function() {
            
            $.ajax({
                type: 'POST',
                url: '/orientadores/store',
                data: {
                    'nome': $('input[name=nomeCreate]').val(),
                    'matricula': $('input[name=matriculaCreate]').val()
                },
                success: function(orientador){
                            
                    $('#orientadores').append('<option value="'+orientador.id+'" selected>'+orientador.nome+'\
                                            </option>');
                        
                    $('#add').removeClass('store-orientador');
                    $('#create').modal('hide');  
                    
                },
                error: function(data){              
                    $('#errors').addClass("alert alert-danger");
                   
                    var errors = $.parseJSON(data.responseText);

                    $.each(errors, function (key, value) {
                    // $('#' + key).parent().addClass('error');
                    output="";
                    if($.isPlainObject(value)) {
                            $.each(value, function (key, value) {                       
                            console.log(key+ " " +value);
                            output+=value+"<br/>";
                            });

                            $('#errors').show().html(output);
                    }
                    });
                }
            });
            $('#nomeCreate').val('');
            $('#matriculaCreate').val('');         
                        
    }); 
 // END---------------- store ORIENTADOR -------------------END //
 // ---------------- store ALUNO ------------------- //
    $(document).on('click', '.add-aluno', function() {
        $('.modal-title').text('Cadastre um Aluno');
        $('#errors').hide();
        $('#add').removeClass('store-orientador');
        $('#add').addClass('store-aluno');
        $.ajax({
            type: 'GET',
            url: '/cursos',
            success:function(cursos){
                output='';
                for(var i in cursos){
                    output += '<option value="'+cursos[i]["id"]+'">'+cursos[i]["nome"]+'</option>';
                }
                $("#curso_idCreate").html(output);
            },
            error:function(error){

            }

        });


        $('.curso_id').show();
        $('#create').modal('show');
    });

    $(document).on('click','.store-aluno', function() {

            $.ajax({
                type: 'POST',
                url: '/alunos/store',
                data: {
                    'nome': $('input[name=nomeCreate]').val(),
                    'matricula': $('input[name=matriculaCreate]').val(),
                    'curso_id':  Number($('#curso_idCreate').val())
                },
                success: function(aluno){
                        
                        $('#alunos').append('<option value="'+aluno.id+'" selected>'+aluno.nome+'\
                                            </option>');
                        
                        
                        $('#create').modal('hide');  
                    
                },
                error: function(data){              
                    $('#errors').addClass("alert alert-danger");

                    var errors = $.parseJSON(data.responseText);

                    $.each(errors, function (key, value) {
                    // $('#' + key).parent().addClass('error');
                    output="";
                    if($.isPlainObject(value)) {
                            $.each(value, function (key, value) {                       
                            console.log(key+ " " +value);
                            output+=value+"<br/>";
                            });

                            $('#errors').show().html(output);
                    }
                    });
                }
            });
            $('#nomeCreate').val('');
            $('#matriculaCreate').val('');         
                        
    }); 
// END---------------- store ALUNO -------------------END //

</script>
@endsection