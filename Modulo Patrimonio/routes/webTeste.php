/*------------------------------ Predio ---------------------------------------------------*/
Route::get('/predio', 'PredioController@listar');
Route::get('/predio/adicionar', 'PredioController@prepararAdicionar');
Route::post('/predio/adicionar', 'PredioController@adicionar');
Route::get('/predio/editar/{id}','PredioController@editar');
Route::post('/predio/atualizar', 'PredioController@atualizar');
