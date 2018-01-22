<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
   return view('index');
});

//Usuário
Route::get('/usuario', 'UsuarioController@lista')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/usuario/detalhes/{id}', 'UsuarioController@mostra')->where('id', '[0-9]+')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/usuario/novo', 'UsuarioController@novo')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::post('/usuario/adiciona', 'UsuarioController@adiciona')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/usuario/remove/{id}','UsuarioController@remove')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/usuario/muda/{id}','UsuarioController@muda')->where('id', '[0-9]+')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::post('/usuario/muda/alterar', 'UsuarioController@alterar')->middleware('auth.TipoUsuario:Administrador,Operador');

/*------------------------------ Departamento ---------------------------------------------------*/

Route::get('/departamento', 'DepartamentoController@lista')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/departamento/novo', 'DepartamentoController@novo')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::post('/departamento/adiciona', 'DepartamentoController@adiciona')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/departamento/muda/{id}','DepartamentoController@muda')->where('id', '[0-9]+')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/departamento/detalhes/{id}','DepartamentoController@mostra')->where('id', '[0-9]+')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::post('/departamento/muda/alterar', 'DepartamentoController@alterar')->middleware('auth.TipoUsuario:Administrador,Operador');

/*------------------------------ Patrimônio ---------------------------------------------------*/
Route::get('/patrimonio', 'PatrimonioController@listar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/patrimonio/orderAlfa', 'PatrimonioController@ordemAlfabetica')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/patrimonio/orderEmpenho', 'PatrimonioController@ordemNumeroEmpenho')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/patrimonio/orderPatrimonio', 'PatrimonioController@ordemNumeroPatrimonio')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/patrimonio/pesquisar', 'PatrimonioController@pesquisar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/patrimonio/adicionar', 'PatrimonioController@prepararAdicionar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::post('/patrimonio/adicionar', 'PatrimonioController@adicionar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/patrimonio/editar/{id}','PatrimonioController@editar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::post('/patrimonio/atualizar', 'PatrimonioController@atualizar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/patrimonio/visualizar/{id}', 'PatrimonioController@visualizar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/patrimonio/remover/{id}', 'PatrimonioController@remover')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/patrimonio/transferir/{id}', 'PatrimonioController@prepararTransferir')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::post('/patrimonio/transferir', 'PatrimonioController@transferir')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/patrimonio/historico/{id}', 'PatrimonioController@historico')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/patrimonio/devolucao/{id}','PatrimonioController@prepararDevolucao')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::post('/patrimonio/devolucao/','PatrimonioController@devolucao')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/patrimonio/descarte/{id}', 'PatrimonioController@prepararDescarte')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::post('/patrimonio/descarte', 'PatrimonioController@descarte')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');


/*------------------------------ Marca --------------------------------------------------------*/
Route::get('/marca', 'MarcaController@listar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/marca/adicionar','MarcaController@prepararAdicionar')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::post('/marca/adicionar', 'MarcaController@adicionar')->middleware('auth.TipoUsuario:Administrador,Operador');

//Servidor
Route::get('/servidor/novo', 'ServidorController@novo')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::post('/servidor/salvar', 'ServidorController@salvar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/servidor/recuperar/{id}', 'ServidorController@recuperar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::post('/servidor/recuperar/alterar/', 'ServidorController@alterar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/servidor/remover/{id}', 'ServidorController@remover')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/servidor/visualizar/{id}', 'ServidorController@visualizar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/servidor/listar', 'ServidorController@listar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/servidor/pesquisar', 'ServidorController@pesquisar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/servidor/ordemAlfa', 'ServidorController@ordemAlfabetica')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/servidor/ordemCargo', 'ServidorController@ordemCargo')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/servidor/ordemMatricula', 'ServidorController@ordemMatricula')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');


/*------------------------------ Sala ---------------------------------------------------*/
Route::get('/sala', 'SalaController@listar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/sala/novo', 'SalaController@novo')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/sala/muda/{id}', 'SalaController@muda')->where('id', '[0-9]+')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/sala/detalhes/{id}', 'SalaController@mostra')->where('id', '[0-9]+')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::post('/sala/adicionar', 'SalaController@adicionar')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/sala/remover/{id}','SalaController@remover')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::post('/sala/muda/atualizar/', 'SalaController@atualizar')->middleware('auth.TipoUsuario:Administrador,Operador');
/*------------------------------ Predio ---------------------------------------------------*/
Route::get('/predio', 'PredioController@listar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/predio/novo', 'PredioController@novo')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/predio/muda/{id}', 'PredioController@muda')->where('id', '[0-9]+')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/predio/detalhes/{id}', 'PredioController@mostra')->where('id', '[0-9]+')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::post('/predio/adicionar', 'PredioController@adicionar')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/predio/remover/{id}','PredioController@remover')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::post('/predio/muda/atualizar', 'PredioController@atualizar')->middleware('auth.TipoUsuario:Administrador,Operador');

//Setor
Route::get('/setor/novo', 'SetorController@novo')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::post('/setor/salvar', 'SetorController@salvar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/setor/recuperar/{id}', 'SetorController@recuperar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::post('/setor/recuperar/alterar/', 'SetorController@alterar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/setor/remover/{id}', 'SetorController@remover')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/setor/visualizar/{id}', 'SetorController@visualizar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/setor/listar', 'SetorController@listar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/setor/pesquisar', 'SetorController@pesquisar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/setor/ordemAlfa', 'SetorController@ordemAlfabetica')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/setor/ordemCurso', 'SetorController@ordemCurso')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');


/*------------------------------ Solicitação---------------------------------------------------*/
Route::get('/solicitacao/adicionar', 'SolicitacaoController@prepararAdicionar');
Route::post('/solicitacao/adicionar', 'SolicitacaoController@adicionar');
Route::get('/solicitacao/listar', 'SolicitacaoController@listar');
Route::get('/solicitacao/remover/{id}', 'SolicitacaoController@remover');
Route::get('/solicitacao/visualizar/{id}', 'SolicitacaoController@visualizar');


/*------------------------------ Setor---------------------------------------------------*/
Route::get('/setor/novo', 'SetorController@novo')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::post('/setor/salvar', 'SetorController@salvar')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/setor/recuperar/{id}', 'SetorController@recuperar')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::post('/setor/recuperar/alterar/', 'SetorController@alterar')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/setor/remover/{id}', 'SetorController@remover')->middleware('auth.TipoUsuario:Administrador,Operador');
Route::get('/setor/visualizar/{id}', 'SetorController@visualizar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/setor/listar', 'SetorController@listar')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');

Auth::routes();

Route::get('/index', 'HomeController@index')->name('index');

Route::get('/index', 'HomeController@index')->name('home');
Route::get('/departamento', 'DepartamentoController@lista');
Route::get('/departamento/novo', 'DepartamentoController@novo');
Route::post('/departamento/adiciona', 'DepartamentoController@adiciona');
Route::get('/departamento/muda/{id}','DepartamentoController@muda')->where('id', '[0-9]+');
Route::post('/departamento/muda/alterar', 'DepartamentoController@alterar');

/*--------------------------- Patrimônio Relatórios ----------------------------------*/
Route::get('/patrimonio/relatorio', 'PatrimonioController@relatorioTodos')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');;
Route::get('/patrimonio/relatorio/setor', 'PatrimonioController@relatorioSetor')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');;
Route::get('/patrimonio/relatorio/sala', 'PatrimonioController@relatorioSala')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');;
Route::get('/patrimonio/relatorio/notafiscal', 'PatrimonioController@relatorioNotaFiscal')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('/patrimonio/relatorio/empenho', 'PatrimonioController@relatorioEmpenho')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');;


/*------------------------------ PDF ---------------------------------------------------*/
Route::get('pdf/selecao', 'PDFController@selecao')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');;
Route::get('pdf/gerarPdf', 'PDFController@gerarPdf')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');;
Route::get('pdf/setor', 'PDFController@bensSetor')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('pdf/sala', 'PDFController@bensSala')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('pdf/nota', 'PDFController@bensNotaFiscal')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');
Route::get('pdf/empenho', 'PDFController@bensEmpenho')->middleware('auth.TipoUsuario:Administrador,Operador,Basico');

