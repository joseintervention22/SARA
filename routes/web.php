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
//contraseña para gmail pzrwpmfpqzeojrbb

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/reembolsos/registros','ReembolsoController@logs')->name('reembolso.log');
Route::get('/reembolsos/registro/asinc','ReembolsoController@logReembolso')->name('reembolso.asinc');
Route::get('/reembolsos/detalle/asinc','ReembolsoController@logReembolso')->name('reembolso.asdetail');
Route::get('ajaxdata/fetchdata', 'ReembolsoController@fetchdata')->name('ajaxdata.fetchdata');



Route::post('/login','Auth\LoginController@login')->name('login');

//RUTAS PARA NOTIFICACIONES EN LA NAVBAR


//RUTAS PARA DAR PERMISOS DESDE EL ADMINISTRADOR
Route::get('/usuarios/lista','AdminController@user')->name('userslists');
Route::get('/usuario/detalle/{id}','AdminController@detail')->name('user.detail');
Route::get('/usuario/detalle/update/{id}','AdminController@updateForm')->name('user.detalle.update');
Route::post('/usuario/detalle/update/admin/{id}','AdminController@updateUser')->name('user.admin.update');

Route::get('/usuario/info/{id}','AdminController@edit')->name('user.info');
Route::post('/usuario/info/role/{id}','AdminController@updateRole')->name('user.refresh');

//RUTAS ADMINISTRADOR PARA LAS AGENCIAS
Route::get('/admin/agencias/main','AdminController@agencias')->name('agencia.index');
Route::get('/admin/agencias/detail/{id}','AdminController@agenciasEdit')->name('agencia.editarf');
Route::post('/admin/agencias/detail/update/{id}','AdminController@updateAgencia')->name('agencia.update');
Route::get('/admin/agencias/create','AdminController@showFormAgencia')->name('agencia.create');
Route::post('/admin/agencias/new','AdminController@createAgencia')->name('agencia.new');


//RUTAS DE PERFIL DEL USUARIO
Route::get('/user/profile', 'UserController@profile')->name('user.profile');
Route::get('/user/edit', 'UserController@edit')->name('user.edit');
Route::post('/user/update','UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}','UserController@getImage')->name('user.avatar');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('reembolsos/create','ReembolsoController@create')->name('reembolso.create');
Route::post('reembolsos/store','ReembolsoController@store')->name('reembolso.store');
Route::get('reembolsos/index', 'ReembolsoController@show')->name('reembolso.show');
Route::get('reembolsos/index/consecutivo', 'ReembolsoController@show')->name('reembolso.search');

Route::get('/reembolso/bajada/{filename}','ReembolsoController@getReembolso')->name('reembolso.pdf');
//el detalle del reembolso
Route::get('/reembolso/detalle/{id?}','ReembolsoController@detalle')->name('reembolso.detail');
Route::get('/reembolso/actualizar{id?}','ReembolsoController@update')->name('reembolso.actualizar');
//actualizar datos del reembolso
Route::post('reembolso/update/{id}', 'ReembolsoController@actualizar')->name('reembolso.update');

Route::get('/reembolsos/revision', 'ReembolsoController@getAllReembolsos')->name('reembolso.all');
Route::get('/reembolsos/revision/consecutivo', 'ReembolsoController@getAllReembolsos')->name('reembolso.searchall');


Route::get('/reembolso/revision/{id?}','ReembolsoController@revisa')->name('reembolso.get');
Route::post('/reembolsos/aprovar', 'ReembolsoController@aprobar1')->name('reembolso.aprobar1');



//firma del reembolso
Route::get('/reembolsos/revisado/firma','ReembolsoController@firma')->name('reembolso.lista.firma');
Route::get('/reembolsos/revisado/firma/consecutivo','ReembolsoController@firma')->name('reembolso.lista.f.consecutivo');
Route::get('/reembolso/revisado/firma/{id?}','ReembolsoController@firmarev')->name('reembolso.firma.detalle');
Route::post('/reembolsos/firmar', 'ReembolsoController@firmar')->name('reembolso.firmar');

//reembolso pago en la administracion
Route::get('/reembolsos/revision/administracion','ReembolsoController@administracion')->name('reembolso.lista.admin');
Route::get('/reembolsos/revision/admin/consecutivo','ReembolsoController@administracion')->name('reembolso.lista.ad.cons');
Route::get('/reembolso/revision/administracion/{id?}','ReembolsoController@admindetalle')->name('reembolso.admin.detalle');
Route::post('/reembolsos/pagar', 'ReembolsoController@pagar')->name('reembolso.pagar');
Route::get('/reembolso/pago/administracion/','ReembolsoController@adminp')->name('reembolso.adminp');
Route::get('/reembolso/revision/pago/{id?}','ReembolsoController@pagoform')->name('reembolso.pago.detalle');
Route::post('/reembolsos/administracion/pagar', 'ReembolsoController@pagarfinal')->name('reembolso.pagado');

//RUTAS PARA EL ARQUEO
Route::get('/arqueo/main','ArqueoController@show')->name('arqueo.main');
Route::get('/arqueo/index','ArqueoController@index')->name('arqueo.index');
Route::post('/arqueo/store','ArqueoController@store')->name('arqueo.create');
//RUTAS PARA LA INTEGRACION DE FONDO
Route::get('/integration/main','IntegrationController@index')->name('integration.main');
Route::get('/integration/select/date','IntegrationController@chooseDate')->name('integration.range');
Route::post('/integration/send/date','IntegrationController@sendDate')->name('integration.send');
//Route::get('/integration/select/arqueo','IntegrationController@select')->name('integration.select');
//indicar el rango de fecha en que se va a sumar el dinero
Route::get('/integration/create/','IntegrationController@create')->name('integration.create');
Route::post('/integration/store','IntegrationController@store')->name('integration.store');

//PDF DESCARGABLE DE LA INTEGRACION DEL FONDO FIJO
Route::get('integration/download/{id}', 'IntegrationController@exportPdf')->name('exporta.pdf');




//busqueda de reembolsos
//lista de reembolsos ya revisados por el revisor nivel tipo triana
Route::get('/reembolsos/yarevisados', 'ReembolsoController@revision')->name('reembolso.reviewed');


//lista de reembolsos  ya firmados por el jefe de Clientes nivel tipo SOLANO O NURICUMBO
Route::get('/reembolsos/firmados', 'ReembolsoController@firmados')->name('reembolso.firmados');
Route::get('/reembolsos/administrados', 'ReembolsoController@administrados')->name('reembolso.administrados');
//PROCESO DE LA OFICINISTA DE FINANZAS
Route::get('/reembolsos/finanzas/lista', 'ReembolsoController@oficina')->name('reembolso.finanza');
Route::get('/reembolsos/revision/finanza/consecutivo','ReembolsoController@oficina')->name('reembolso.finanza.cons');
Route::get('/reembolso/revision/finanza/{id?}','ReembolsoController@oficinaDetalle')->name('reembolso.finanza.detalle');
Route::post('/reembolso/revision/finanza/programa','ReembolsoController@oficinaPrograma')->name('reembolso.finanza.programa');





