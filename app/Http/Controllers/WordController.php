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

    // Load the table with words for the selected theme.
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

    //Add a new word for the selected theme.
    public function store(Request $request,$id){
        $max_semanticid = Words::max('semantic_id') + 1; //Get the last semantic_id. Increment so the semantic_id wont be the same as the max one.
        $word = new Words();
        $word->value = $request->value;
        $word->language_id = $request->idlanguage;
        $word->semantic_id = $max_semanticid;
        $word->save();
        $word->themes()->attach($id); //Link in the many to many table with the theme_id

        //Reload the same page after adding datas.
        return redirect()->action(
            'WordController@load', ['id' => $id]
        );
    }

    //Add a new word for the existant selected word and the selected language.
    public function update(Request $request,$id){
        $word = new Words();
        $word->value = $request->value;
        $word->language_id = $request->idlang;
        $word->semantic_id = $request->idsem;
        $word->save();
        $word->themes()->attach($id);

        //Reload the same page after adding datas.
        return redirect()->action(
            'WordController@load', ['id' => $id]
        );
    }


}