<?php

namespace App\Http\Controllers;

use App\FullVocabulary;
use App\Languages;
use App\Themes;
use App\Words;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display all themes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Themes::all();
        return view('theme')->with('themes', $themes);
    }

    /**
     * Add a new vocabulary to the themes.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $theme = new Themes();
        $theme->title = $request->addvocabulary;
        $theme->save();

        return redirect('themes');
    }

    // Delete a theme where the button got clicked.
    public function delete(Request $request){
        $theme = Themes::find($request->delid);
        $theme->delete();

        return redirect('themes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function apiVocList()
    {
        $languages = Languages::all();
        return $languages;
    }

    public function apiFullVocList()
    {
        $vocs = Themes::select("id as mId","title as mTitle", "language1_id as mLang1", "language2_id as mLang2")->get();
        for ($v = 0; $v < count($vocs); $v++)
        {
            $words = Words::select("id as mId","value1 as mValue1","value2 as mValue2")->where("vocabulary_id","=",$vocs[$v]->mId)->get();
            $vocs[$v]['Words']=$words;
        }

        return $vocs;
    }

    public function apiLangList()
    {
        return Languages::select("id as lId","languageName as lName")->get();
    }

    public function apiVocabulary($vid)
    {
        $title = Themes::select("title")->where("id",$vid)->first()->title;
        $words = Words::select("id as mId", "value1 as mValue1", "value2 as mValue2")->where("vocabulary_id",$vid)->get();
        $fv = new FullVocabulary($vid,$title,$words);
        return $fv;
    }

    public function apiLangVocList($lid1,$lid2)
    {
        $res = Themes::select("id as mId","title as mTitle")->where("language1_id",$lid1)->where("language2_id",$lid2)->get();
        return $res;
    }

}
