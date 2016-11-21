<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client; // important

class InstagramController extends Controller
{
    public function index(Request $request)
    {
    	$items = [];

    	if($request->has('username')){

      	 $client = new Client;
         // %s = username
      	 $url = sprintf('https://www.instagram.com/%s/media', $request->input('username'));
         $response = $client->get($url);
         $items = json_decode((string) $response->getBody(), true)['items'];

    	}
      
    	return view('instagram', [ 'items' => $items ]);
    }
}
