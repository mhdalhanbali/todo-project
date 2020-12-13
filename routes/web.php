 <?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/todos.todos', function(){
    return view ('todos');
});
Route::get('/todos/{todo}', 'App\Http\Controllers\todosController@show');
Route::get('/todos', 'App\Http\Controllers\todosController@index');
Route::get('/create','App\Http\Controllers\todosController@create');
Route::post('/create', 'App\Http\Controllers\todosController@store');
Route::get('/todos/{todo}/edit','App\Http\Controllers\todosController@edit' );
Route::post('/todos/{todo}','App\Http\Controllers\todosController@update');
Route::get('/todos/{todo}/delete','App\Http\Controllers\todosController@destroy');
Route::get('/todos/{todo}/complete','App\Http\Controllers\todosController@complete');
