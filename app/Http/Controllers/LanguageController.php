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

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Languages::all();
        return view('language')->with('languages', $languages);
    }

}