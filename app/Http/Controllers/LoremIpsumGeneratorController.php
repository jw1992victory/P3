<?php

namespace P3\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

class LoremIpsumGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('P3.LoremIpsumGenerator');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        if ($request->__isset('random')) {
            $length = rand(0, 99);
        } else {

            $validator = Validator::make($request->all(), [
                'length' => 'required|between:0,99|numeric'
            ]);

            if ($validator->fails()) {
                return redirect('loremipsumgenerator')->withErrors($validator)->withInput();
            }

            $length = $request->input('length');
        }

        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs($length);

        return view('P3.result', [
            'paragraphs' => $paragraphs,
            'length' => trim($length)
        ]);
    }
}
