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
use GuzzleHttp\Client;

//Route::get('lanzamientos', 'LanzamientoController@index')->name('lanzamientos');

Route::get('/', function(){
	$session = new SpotifyWebAPI\Session(
	    config('spotify.SPOTIFY_CLIENT_ID'),
	    config('spotify.SPOTIFY_CLIENT_SECRET'),
	    config('spotify.SPOTIFY_CALLBACK_URL')
	);

	$api = new SpotifyWebAPI\SpotifyWebAPI();

	if (isset($_GET['code'])) {
	    $session->requestAccessToken($_GET['code']);
	    $api->setAccessToken($session->getAccessToken());

	    print_r($api->me());
	} else {
	    $options = [
	        'scope' => [
	            'user-read-email',
	        ],
	    ];

	    header('Location: ' . $session->getAuthorizeUrl($options));
    die();
	}
})->name('home');

Route::get('callback', 'LanzamientoController@callback')->name('callback');

Route::get('lanzamientos', 'LanzamientoController@index')->name('lanzamientos');

Route::get('artista/{id}', 'ArtistaController@show')->name('artistas.show');


