<?php

namespace P3\Http\Controllers;

use P3\Http\Requests;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('P3.homepage');
    }
}
