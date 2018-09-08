<?php

namespace App\Http\Controllers;

use App\Artista;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.spotify.com/v1',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        try{
            $artist_detail = $client->request(
                            'GET',
                            '/v1/artists/'.$id,
                            ['headers' => 
                                [
                                    'Authorization' => 'Bearer '.request()->input('token')
                                ]
                            ]
                        )->getBody()->getContents();
        }catch (ClientException  $e) {
            return redirect()->route('home');
        }

        try{
            $artist_tracks = $client->request(
                            'GET',
                            '/v1/artists/'.$id.'/top-tracks?country=CO',
                            ['headers' => 
                                [
                                    'Authorization' => 'Bearer '.request()->input('token')
                                ]
                            ]
                        )->getBody()->getContents();
        }catch (ClientException  $e) {
            return redirect()->route('home');
        }
        
        return view('detalle_artista')
            ->with('artist', json_decode($artist_detail))
            ->with('artist_tracks', json_decode($artist_tracks));
    }
}
