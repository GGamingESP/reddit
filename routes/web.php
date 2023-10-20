<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => 'true']);

Auth::routes();

Route::get('community', [App\Http\Controllers\CommunityLinkController::class, 'index']);
Route::post('community', [App\Http\Controllers\CommunityLinkController::class, 'store'])->middleware('auth');
Route::get('community/{channel:slug}', [App\Http\Controllers\CommunityLinkController::class, 'index']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/ruta/{parametro?}', function ($parametro = null) {
    return "Parámetro opcional: " . $parametro;
});


Route::get('/ruta2/{parametro?}', function ($parametro = 'valor_por_defecto') {
    return "Parámetro opcional con valor por defecto: " . $parametro;
});


Route::post('/rutapost', function () {
    return "Esta es una ruta POST :) ";
});

Route::match(['get', 'post'], '/getpost', function () {
    if (request()->isMethod('post')) {
        return "Esta es una solicitud POST :)";
    } else {
        return "Esta es una solicitud GET :) ";
    }
});

Route::get('/esnumero/{parametro}', function ($parametro) {
    if (is_numeric($parametro)) {
        return "Es un numero";
    } else {
        return "No es un numero";
    }
});

Route::get('/numletras/{letras}/{numeros}', function ($letras, $numeros) {
    if (is_string($letras) && is_numeric($numeros)) {
        return "Primer parámetro son letras, segundo parámetro son números: " . $letras . " - " . $numeros;
    } else {
        return "Los parámetros no cumplen con los requisitos";
    }
});

Route::get('/host', function () {
    $direccion = env("DB_HOST");
    return 'La direccion de la base de datos es ' . $direccion;
});

Route::get('/timezone', function () {
    $zona = config('app.timezone');
    return "La zona horaria es " . $zona;
});

Route::view('/inicio', 'inicio');

Route::view('/errorprueba', 'errorprueba');

Route::get('/fecha', function () {
    return view('fecha')->with([
        'dia' => date('d'),
        'mes' => date('m'),
        'ano' => date('Y'),
    ]);
});
