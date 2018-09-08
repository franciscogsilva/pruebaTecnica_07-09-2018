<?php

namespace App\Http\Controllers;

use App\Lanzamiento;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use SpotifyWebAPI\Session;

class LanzamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		$client = new Client([
		    // Base URI is used with relative requests
		    'base_uri' => 'https://api.spotify.com/v1',
		    // You can set any number of default request options.
		    'timeout'  => 2.0,
		]);

		try {			
			$response = $client->request(
							'GET',
							'/v1/browse/new-releases?country=CO&offset=0&limit=20',
							['headers' => 
								[
									'Authorization' => 'Bearer '.request()->input('token')
								]
							]
						)->getBody()->getContents();
		} catch (ClientException  $e) {
			return redirect()->route('home');
		}

		return view('lanzamientos')
			->with('lanzamientos', json_decode($response))
			->with('token', request()->input('token'));
    }

    public function callback(){
    	$session = new Session(
		    config('spotify.SPOTIFY_CLIENT_ID'),
		    config('spotify.SPOTIFY_CLIENT_SECRET'),
		    config('spotify.SPOTIFY_CALLBACK_URL')
		);

		// Request a access token using the code from Spotify
		//$session->requestAccessToken($_GET['code']);
		$session->requestAccessToken(request()->input('code'));

		$accessToken = $session->getAccessToken();
		//$refreshToken = $session->getRefreshToken();

		// Store the access and refresh tokens somewhere. In a database for example.

		// Send the user along and fetch some data!
		//dd($accessToken);

		return redirect()->route('lanzamientos', ['token' => $accessToken]);
    }
}
