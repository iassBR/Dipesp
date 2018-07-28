<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
     
        <!-- @foreach($filtros->all() as $filtro => $valor)
            @if($filtro == '_token')

            @else if()
                {{$filtro}}: {{$valor}}
            @endif
        
        @endforeach -->
        <div id="page-header">
            <center>
                <span>
                    <img src="/home/giordani/Desktop/Dipesp/public/images/mini_logo_header_center.png" class="image-header"/>
                </span>
                
                <span id="isntitucional-header">
                    <p>MINISTÉRIO DA EDUCAÇÃO</p>
                    <p>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DE RORAIMA<p>
                    <p>Diretoria de Pesquisa, Pós-Graduação e Inovação</p>
                    <p>Campos Boa Vista</p>
                </span>
            </center>
        </div>
        
        <div id="page-body">
            <h1 class="page-title text-center"> RELATÓRIO DE PROJETOS</h1>

            <div class="report-description">
                <h4>Descrição</h4>
                <p>
                {{ ($descricao)? $descricao : 'Sem descrições adicionais.' }}
                </p>
            </div>

            <table class="table table-bordered table-striped  dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Aluno(a)</th>
                        <th>Orientador(a)</th>
                        <th>Curso</th>
                        <th>Ano</th>
                    </tr>
                </thead>
                <tbody id="">                
                    @foreach($projetos as $projeto)
                        <tr>        
                            <td>{{$projeto->titulo}}</td>
                            <td>{{$projeto->aluno->nome}}</td>
                            <td>{{$projeto->orientador->nome}}</td>
                            <td>{{$projeto->aluno->curso->nome}}</td>
                            <td>{{$projeto->ano_publicacao}}</td>
                        </tr>                                    
                    @endforeach                                 
                </tbody>                        
            </table>
        </div>
    </body>
</html>

<style>
    body {
        margin-top: 0px;
        padding-top:0px;
    }
    #page-header {
        margin-top: 0px;
        font-size: 11px; 
    }

    .image-header {
        margin-top: 0px;
        margin-bottom: 0px;
        height: 40px;
        width: 40px;
        text-align:center;
    }

    #isntitucional-header {
        paddign-bottom: 20px;
    }

    #isntitucional-header p {
        font-weight:bold;
        margin-bottom: 0px;
        margin-top:0px;
    }

    #page-body {
        padding-top: 7px;
        font-size: 14px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    th {
        background-color: #4CAF50;
        color: black;
        {{--  text-align: center;  --}}
        padding-bottom: 2px;
        margin-bottom:10px;
    }

    .page-title {
        font-size: 18px;
        font-weight:bold;
    }

    .text-center {
        text-align: center;
    }

    .report-description {
        text-align: justify;
        margin-bottom: 20px;
        margin-top: 13px;
    }

</style>