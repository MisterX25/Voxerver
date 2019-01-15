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
    public function index()
    {
        $languages = Languages::all();
        return view('language')->with('languages', $languages);
    }

    public function store(Request $request){
        $language = new Languages();
        $language->save();
        $languages = Languages::all();
        return redirect('languages')->with('languages', $languages);
    }

    public function delete(Request $request){
        $language = Thing::find($request->get());
        $language->delete();

        $languages = Languages::all();
        return redirect('languages')->with('languages', $languages)
    }

}