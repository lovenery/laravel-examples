<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use XmlParser;

class ZipCodeController extends Controller
{
    public function search(Request $request)
    {
        // api
        if ($request->has('c')) {

            // load file
            $xml = XmlParser::load('xml/Xml_10508.xml');

            // data array
            $data = $xml->parse([
                'zip' => ['uses' => 'Xml_10508[欄位1>code,欄位2>road,欄位3>rule,欄位4>area]' ]
            ]);

            // data collect
            $data_collect = collect($data['zip']);
            $zipCode = request()->get('c');
            $target = $data_collect->where('code', $zipCode)->first();

            return response()->json($target);
        }

        // view
        return view('zipcode', [
            'domain' => url('/')
        ]);
    }
}
