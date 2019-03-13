<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToneAnalyzerController extends Controller
{
    public function getDataRequest()
    {
        return view('tone-analyzer');
    }

    public function getDataResponse(Request $request)
    {
        $data = json_encode(array('text' => $request->text));

        // initialize credentials
        $APIKEY = env('TONEANALYZER_APIKEY');

        // Connect Dallas Server
        $URL = 'https://gateway.watsonplatform.net/tone-analyzer/api/v3/tone?version=2017-09-21';

        // initialize session
        $curl = curl_init();

        // set session
        curl_setopt_array($curl, array(
            CURLOPT_POST => true,
            CURLOPT_URL => $URL,
            CURLOPT_USERPWD => "APIKEY:$APIKEY",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $decodedJson = json_decode($response);
        }

        // dd($decodedJson);
        return view('tone-analyzer', compact('decodedJson'));
    }
}
