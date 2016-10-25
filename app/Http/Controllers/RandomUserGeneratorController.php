<?php

namespace P3\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;

class RandomUserGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('P3.RandomUserGenerator');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'length' => 'required|between:1,99|numeric'
        ]);

        if ($validator->fails()) {
            return redirect('randomusergenerator')->withErrors($validator)->withInput();
        }

        $length = $request->input('length');
        $gender = $request->input('gender');
        $region = $request->input('region');

        // send request to API
        $client = new  Client();

        try {
            $response = $client->get($this->formatUrl($length, $gender, $region));
        } catch (RequestException $ex) {
            return redirect('RandomUserGenerator');
        }

        $users = [];

        $response = json_decode($response->getBody()->getContents(), true);

        if ($length == 1) {
            $users[] = $response;
        } else {
            $users = $response;
        }

        return view('P3.user', [
            'users' => $users,
            'length' => trim($length)
        ]);
    }

    /**
     * Create the url used to ping API
     *
     * @param  string  $length
     * @param  string  $gender
     * @param  string  $region
     *
     * @return string $url
     */
    function formatUrl($length, $gender, $region) {
        $url = 'http://uinames.com/api/?ext&amount='.$length;

        if ($gender != 'random') {
            $url .= '&gender='.$gender;
        }

        if ($region != 'random') {
            $url .= '&region='.$region;
        }

        return $url;
    }
}
