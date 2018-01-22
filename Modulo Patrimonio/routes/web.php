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
Route::get('/usuario', 'UsuarioController@lista')->middleware('can:acessoRestrito-global');
Route::get('/usuario/detalhes/{id}', 'UsuarioController@mostra')->where('id', '[0-9]+')->middleware('can:visualizar-global');;
Route::get('/usuario/novo', 'UsuarioController@novo')->middleware('can:criar-global');
Route::post('/usuario/adiciona', 'UsuarioController@adiciona')->middleware('can:criar-global');
Route::get('/usuario/remove/{id}','UsuarioController@remove')->middleware('can:remover-global');
Route::get('/usuario/muda/{id}','UsuarioController@muda')->where('id', '[0-9]+')->middleware('can:editar-global');
Route::post('/usuario/muda/alterar', 'UsuarioController@alterar')->middleware('can:editar-global');

/*------------------------------ Departamento ---------------------------------------------------*/

Route::get('/departamento', 'DepartamentoController@lista');
Route::get('/departamento/novo', 'DepartamentoController@novo')->middleware('can:criar-global');
Route::post('/departamento/adiciona', 'DepartamentoController@adiciona')->middleware('can:criar-global');
Route::get('/departamento/muda/{id}','DepartamentoController@muda')->where('id', '[0-9]+')->middleware('can:editar-global');
Route::get('/departamento/detalhes/{id}','DepartamentoController@mostra')->where('id', '[0-9]+')->middleware('can:visualizar-global');
Route::post('/departamento/muda/alterar', 'DepartamentoController@alterar')->middleware('can:editar-global');

/*------------------------------ Patrimônio ---------------------------------------------------*/

Route::get('/patrimonio', 'PatrimonioController@listar');
Route::get('/patrimonio/orderAlfa', 'PatrimonioController@ordemAlfabetica');
Route::get('/patrimonio/orderEmpenho', 'PatrimonioController@ordemNumeroEmpenho');
Route::get('/patrimonio/orderPatrimonio', 'PatrimonioController@ordemNumeroPatrimonio');
Route::get('/patrimonio/pesquisar', 'PatrimonioController@pesquisar');
Route::get('/patrimonio/adicionar', 'PatrimonioController@prepararAdicionar')->middleware('can:criar-global');
Route::post('/patrimonio/adicionar', 'PatrimonioController@adicionar')->middleware('can:criar-global');
Route::get('/patrimonio/editar/{id}','PatrimonioController@editar')->middleware('can:editar-global');
Route::post('/patrimonio/atualizar', 'PatrimonioController@atualizar')->middleware('can:editar-global');
Route::get('/patrimonio/visualizar/{id}', 'PatrimonioController@visualizar')->middleware('can:visualizar-global');
Route::get('/patrimonio/remover/{id}', 'PatrimonioController@remover')->middleware('can:remover-global');
Route::get('/patrimonio/transferir/{id}', 'PatrimonioController@prepararTransferir');
Route::post('/patrimonio/transferir', 'PatrimonioController@transferir');
Route::get('/patrimonio/historico/{id}', 'PatrimonioController@historico');
Route::get('/patrimonio/devolucao/{id}','PatrimonioController@prepararDevolucao');
Route::post('/patrimonio/devolucao/','PatrimonioController@devolucao');
Route::get('/patrimonio/descarte/{id}', 'PatrimonioController@prepararDescarte')->middleware('can:remover-global');
Route::post('/patrimonio/descarte', 'PatrimonioController@descarte')->middleware('can:remover-global');
Route::get('/patrimonio/descartes/', 'PatrimonioController@listarDescartados');


/*------------------------------ Marca --------------------------------------------------------*/
Route::get('/marca', 'MarcaController@listar');
Route::get('/marca/adicionar','MarcaController@prepararAdicionar')->middleware('can:criar-global');
Route::post('/marca/adicionar', 'MarcaController@adicionar')->middleware('can:criar-global');

//Servidor
Route::get('/servidor/novo', 'ServidorController@novo')->middleware('can:criar-global');
Route::post('/servidor/salvar', 'ServidorController@salvar')->middleware('can:criar-global');
Route::get('/servidor/recuperar/{id}', 'ServidorController@recuperar')->middleware('can:editar-global');
Route::post('/servidor/recuperar/alterar/', 'ServidorController@alterar')->middleware('can:editar-global');
Route::get('/servidor/remover/{id}', 'ServidorController@remover')->middleware('can:remover-global');
Route::get('/servidor/visualizar/{id}', 'ServidorController@visualizar')->middleware('can:visualizar-global');
Route::get('/servidor/listar', 'ServidorController@listar');
Route::get('/servidor/pesquisar', 'ServidorController@pesquisar');
Route::get('/servidor/ordemAlfa', 'ServidorController@ordemAlfabetica');
Route::get('/servidor/ordemCargo', 'ServidorController@ordemCargo');
Route::get('/servidor/ordemMatricula', 'ServidorController@ordemMatricula');


/*------------------------------ Sala ---------------------------------------------------*/
Route::get('/sala', 'SalaController@listar');
Route::get('/sala/orderAlfa', 'SalaController@ordemAlfabetica');
Route::get('/sala/pesquisar', 'SalaController@pesquisar');
Route::get('/sala/novo', 'SalaController@novo')->middleware('can:criar-global');
Route::get('/sala/muda/{id}', 'SalaController@muda')->where('id', '[0-9]+')->middleware('can:editar-global');
Route::get('/sala/detalhes/{id}', 'SalaController@mostra')->where('id', '[0-9]+')->middleware('can:visualizar-global');
Route::post('/sala/adicionar', 'SalaController@adicionar')->middleware('can:criar-global');
Route::get('/sala/remover/{id}','SalaController@remover')->middleware('can:remover-global');
Route::post('/sala/muda/atualizar/', 'SalaController@atualizar')->middleware('can:editar-global');
/*------------------------------ Predio ---------------------------------------------------*/
Route::get('/predio', 'PredioController@listar');
Route::get('/predio/orderAlfa', 'PredioController@ordemAlfabetica');
Route::get('/predio/pesquisar', 'PredioController@pesquisar');
Route::get('/predio/novo', 'PredioController@novo')->middleware('can:criar-global');
Route::get('/predio/muda/{id}', 'PredioController@muda')->where('id', '[0-9]+')->middleware('can:editar-global');
Route::get('/predio/detalhes/{id}', 'PredioController@mostra')->where('id', '[0-9]+')->middleware('can:visualizar-global');
Route::post('/predio/adicionar', 'PredioController@adicionar')->middleware('can:criar-global');
Route::get('/predio/remover/{id}','PredioController@remover')->middleware('can:remover-global');
Route::post('/predio/muda/atualizar', 'PredioController@atualizar')->middleware('can:editar-global');

//Setor
Route::get('/setor/novo', 'SetorController@novo')->middleware('can:criar-global');
Route::post('/setor/salvar', 'SetorController@salvar')->middleware('can:criar-global');
Route::get('/setor/recuperar/{id}', 'SetorController@recuperar')->middleware('can:editar-global');
Route::post('/setor/recuperar/alterar/', 'SetorController@alterar')->middleware('can:editar-global');
Route::get('/setor/remover/{id}', 'SetorController@remover')->middleware('can:remover-global');
Route::get('/setor/visualizar/{id}', 'SetorController@visualizar')->middleware('can:visualizar-global');
Route::get('/setor/listar', 'SetorController@listar');
Route::get('/setor/pesquisar', 'SetorController@pesquisar');
Route::get('/setor/ordemAlfa', 'SetorController@ordemAlfabetica');
Route::get('/setor/ordemCurso', 'SetorController@ordemCurso');


/*------------------------------ Solicitação---------------------------------------------------*/
Route::get('/solicitacao/adicionar', 'SolicitacaoController@prepararAdicionar')->middleware('can:criar-global');
Route::post('/solicitacao/adicionar', 'SolicitacaoController@adicionar')->middleware('can:criar-global');
Route::get('/solicitacao/listar', 'SolicitacaoController@listar');
Route::get('/solicitacao/remover/{id}', 'SolicitacaoController@remover')->middleware('can:remover-global');
Route::get('/solicitacao/visualizar/{id}', 'SolicitacaoController@visualizar')->middleware('can:visualizar-global');


/*------------------------------ Setor---------------------------------------------------*/
Route::get('/setor/novo', 'SetorController@novo')->middleware('can:criar-global');
Route::post('/setor/salvar', 'SetorController@salvar')->middleware('can:criar-global');
Route::get('/setor/recuperar/{id}', 'SetorController@recuperar')->middleware('can:editar-global');
Route::post('/setor/recuperar/alterar/', 'SetorController@alterar')->middleware('can:editar-global');
Route::get('/setor/remover/{id}', 'SetorController@remover')->middleware('can:remover-global');
Route::get('/setor/visualizar/{id}', 'SetorController@visualizar')->middleware('can:visualizar-global');
Route::get('/setor/listar', 'SetorController@listar');

Auth::routes();

Route::get('/index', 'HomeController@index')->name('index');


/*--------------------------- Patrimônio Relatórios ----------------------------------*/
Route::get('/patrimonio/relatorio', 'PatrimonioController@relatorioTodos');;
Route::get('/patrimonio/relatorio/setor', 'PatrimonioController@relatorioSetor');;
Route::get('/patrimonio/relatorio/sala', 'PatrimonioController@relatorioSala');;
Route::get('/patrimonio/relatorio/notafiscal', 'PatrimonioController@relatorioNotaFiscal');
Route::get('/patrimonio/relatorio/empenho', 'PatrimonioController@relatorioEmpenho');;


/*------------------------------ PDF ---------------------------------------------------*/
Route::get('pdf/selecao', 'PDFController@selecao');;
Route::get('pdf/gerarPdf', 'PDFController@gerarPdf');;
Route::get('pdf/setor', 'PDFController@bensSetor');
Route::get('pdf/sala', 'PDFController@bensSala');
Route::get('pdf/nota', 'PDFController@bensNotaFiscal');
Route::get('pdf/empenho', 'PDFController@bensEmpenho');

