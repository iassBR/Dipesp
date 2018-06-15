<?php

    Auth::routes();

    Route::get('/', function () {
        return redirect()->route('home');
    });

    // -------------------------- HOME ---------------------- //      
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('home', 'HomeController@busca')->name('busca.resultado');
    Route::post('home/relatorio', 'HomeController@geraRelatorio')->name('gera.pdf');

    // END-------------------------- HOME ----------------------END //
    Route::get('projetos/uploads/{arquivo}', 'ProjetoController@displayFile')->name('projetos.displayFile');


    Route::get('/logout', 'AccountController@logout')->name('accounts.logout');

    Route::group(['middleware' => 'auth'], function () {

// ----------------------------- ADMIN --------------------------------//   
       
    Route::resource('usuarios', 'Admin\UsuarioController');
  
    Route::delete('/usuarios/destroy/{id}', 'Admin\UsuarioController@destroy');
    Route::put('usuarios/{id}/edit', ['as'=>'usuarios.edit','uses' => 'Admin\UsuarioController@update']);
    Route::get('usuarios/papel/{id}', ['as'=>'usuarios.papel','uses'=>'Admin\UsuarioController@papel']);
    Route::post('user/papel/{usuario}/{papel}', ['as'=>'user.papel.store','uses'=>'Admin\UsuarioController@papelStore']);
    Route::delete('user/papel/{usuario}/{papel}', ['as'=>'user.papel.destroy','uses'=>'Admin\UsuarioController@papelDestroy']);

    Route::resource('papeis','Admin\PapelController');

    Route::resource('papeis', 'Admin\PapelController');
    Route::delete('/papeis/destroy/{id}', 'Admin\PapelController@destroy');
    Route::get('papeis/permissao/{id}', ['as'=>'papeis.permissao','uses'=>'Admin\PapelController@permissao']);
    Route::post('papeis/permissao/{papel}/{permissao}', ['as'=>'papeis.permissao.store','uses'=>'Admin\PapelController@permissaoStore']);
    Route::delete('papeis/permissao/{papel}/{permissao}', ['as'=>'papeis.permissao.destroy','uses'=>'Admin\PapelController@permissaoDestroy']);
  
    // END----------------------------- ADMIN --------------------------------END //
        
    // -------------------------- Projetos ---------------------- //
    Route::resource('projetos', 'ProjetoController');    
    Route::get('projetos/{projeto}/remove', 'ProjetoController@remove')->name('projetos.remove');  
   
    // END-------------------------- Projetos ----------------------END // 

    // -------------------------- Orientadores ---------------------- //
    Route::resource('orientadores','OrientadorController');
    Route::post('/orientadores/store', 'OrientadorController@store');
    Route::put('/orientadores/update','OrientadorController@update');
    Route::delete('/orientadores/destroy/{id}', 'OrientadorController@destroy');

    // END-------------------------- Orientadores ----------------------END //

    // -------------------------- Alunos ---------------------- //
    Route::resource('alunos','AlunoController');
    Route::post('/alunos/store', 'AlunoController@store');
    Route::delete('/alunos/destroy/{id}', 'AlunoController@destroy');
    // END-------------------------- Alunos ----------------------END //

    // -------------------------- Cursos ---------------------- //
    Route::resource('cursos','CursoController');
    Route::post('/cursos/store', 'CursoController@store');
    Route::delete('/cursos/destroy/{id}', 'CursoController@destroy');
    // END-------------------------- Cursos ----------------------END //
});