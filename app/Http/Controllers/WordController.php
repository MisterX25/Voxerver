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
        /*$word = Words::find(4);
        $vocs = $word->themes;
        $voc = Themes::find(1);
        $words = $voc->words;*/

        $words = Words::all();
        $themes = Themes::all();
        $languages = Languages::all();

        return view('vocabulary')->with('words', $words)->with('themes', $themes)->with('languages', $languages);
    }

    public function load($id){
        $languages = Languages::all();
        $theme = Themes::where('id', $id)->first();
        $voc = Themes::find($id);
        $wordsofvoc = $voc->words;
        $res = array();

        //Put the word in the same array with the same semantic_id
        foreach($wordsofvoc as $word){
            $res[$word->semantic_id][$word->language_id] = $word->value;
        }

        //dd($res);

        return view('word')->with('theme', $theme)->with('languages', $languages)->with('res', $res);
    }



}