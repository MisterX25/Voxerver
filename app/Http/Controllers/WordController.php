<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 22.01.2019
 * Time: 08:12
 */

namespace App\Http\Controllers;

use App\Languages;
use App\Themes;
use App\Words;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index(){
        $words = Words::all();
        $themes = Themes::all();
        $languages = Languages::all();

        return view('vocabulary')->with('words', $words)->with('themes', $themes)->with('languages', $languages);
    }

    public function load($id){
        $words = Words::all();
        $theme = Themes::where('id', $id)->first();
        $languages = Languages::all();

        return view('word')->with('words', $words)->with('theme', $theme)->with('languages', $languages);
    }



}