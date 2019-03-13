<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisualRecognitionController extends Controller
{
    public function getDataResponse()
    {

        $jpg = "hobbit.png";
        $data = array("images_file" => new \CURLFile($jpg, mime_content_type($jpg), basename($jpg)));

        // initialize credentials
        $APIKEY = env('VISUALRECOGNITION_APIKEY');

        $url = "https://gateway.watsonplatform.net/visual-recognition/api/v3/classify?version=2018-03-19";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_POST => true,
            CURLOPT_URL => $url,
            CURLOPT_USERPWD => "APIKEY:$APIKEY",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_VERBOSE => true,
            CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_HTTPAUTH => CURLAUTH_BASIC
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $decodedJson = json_decode($response, true);
        }
        dd($decodedJson);
        return view('visual-recognition', compact('decodedJson'));
    }
}
