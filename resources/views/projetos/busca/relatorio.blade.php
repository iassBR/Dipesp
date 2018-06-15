<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
        
    </head>
    <body>
        <table id="projetos" class="table table-bordered table-striped  dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Ano de publicação</th>
                    <th>Orientador</th>
                    <th>Aluno</th>
                    <th>Área de Pesquisa</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tbody id="">                
                @foreach($projetos as $projeto)
                    <tr>        
                        <td>{{$projeto->titulo}}</td>
                        <td>{{$projeto->ano_publicacao}}</td>
                        <td>{{$projeto->orientador->nome}}</td>
                        <td>{{$projeto->aluno->nome}}</td>
                        <td>{{$projeto->area_pesquisa->descricao}}</td>
                        <td>{{$projeto->aluno->curso->nome}}</td>
                    </tr>                                    
                @endforeach                                        
            </tbody>                        
        </table>
    </body>
</html>