<?php
/**
 * Created by PhpStorm.
 * User: wenjiang
 * Date: 10/23/16
 * Time: 5:18 PM
 */

namespace P3\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class PasswordGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('P3.PasswordGenerator');
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
            'length' => 'required|between:1,9|numeric'
        ]);

        if ($validator->fails()) {
            return redirect('passwordgenerator')->withErrors($validator)->withInput();
        }

        if (!file_exists("words.csv")) {
            $this->loadWordsToFile();
        }

        $words = file_get_contents("words.csv");

        $words_array = explode(",", $words);

        $length = $request->input('length');

        $password = $this->getNextRandomWord($words_array, $length);

        if ($request->__isset('contain_number')) {
            $password .= rand(0, 9);
        }

        if ($request->__isset('contain_symbol')) {
            $password .= '@';
        }

        return view('P3.password', [
            'password' => $password,
            'length' => trim($length)
        ]);
    }

    /**
     * get $number words long password form words array
     *
     * @param $words_array array contains words dictionary
     * @param $number      int   length of password, default to 4
     *
     * @return string generated password
     */
    function getNextRandomWord($words_array, $number = default_value)
    {
        $generated_password = '';

        $size = sizeof($words_array);

        for ($i = 0; $i < $number; $i ++) {

            $index = rand(0, $size - 1);

            while (!ctype_alpha($words_array[$index])) {
                $index = rand(0, $size - 1);
            }

            $generated_password .= $words_array[$index];

            if ($i < ($number-1)) {
                $generated_password .= '-';
            }
        }

        return $generated_password;
    }

    /*
     * loads a word dictionary from crawling paulnoll page
     */
    function loadWordsToFile() {
        $words = [];

        for ($i= 1; $i < 30; $i=$i+2) {
            $name = 'http://www.paulnoll.com/Books/Clear-English/words-' . sprintf("%02d", $i) . '-' . sprintf("%02d", ($i + 1)) . '-hundred.html';

            $array_words = file_get_contents($name);

            preg_match_all("~<li>(.*?)</li>~s", $array_words, $matches, PREG_PATTERN_ORDER);

            foreach($matches[1] as $value) {
                $words[] = trim($value);
            }
        }

        $result = implode(",", $words);

        file_put_contents("words.csv", $result);
    }
}