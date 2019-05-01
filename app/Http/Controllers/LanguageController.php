<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 11.01.2019
 * Time: 13:58
 */

namespace App\Http\Controllers;

use App\Languages;
use Illuminate\Http\Request;
use Log;

class LanguageController extends Controller
{
    //Show all languages.
    public function index()
    {
        $languages = Languages::all();
        return view('language')->with('languages', $languages);
    }

    //Add a new language.
    public function store(Request $request){
        $language = new Languages();
        $language->languageName = $request->addlanguage;
        $language->save();

        return redirect('languages');
    }

    //Delete a language where the button got clicked.
    public function delete(Request $request){
        //dd($request);
        $language = Languages::find($request->delid);
        $language->delete();

        return redirect('languages');
    }

}