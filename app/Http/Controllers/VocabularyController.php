<?php

namespace App\Http\Controllers;

use App\FullVocabulary;
use App\Languages;
use App\Vocabulary;
use App\Words;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        error_log("VocabularyController.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return Vocabulary::select("id as mId","title as mTitle")->get();
    }

    public function apiFullVocList()
    {
        $vocs = Vocabulary::select("id as mId","title as mTitle", "language1_id as mLang1", "language2_id as mLang2")->get();
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
        $title = Vocabulary::select("title")->where("id",$vid)->first()->title;
        $words = Words::select("id as mId", "value1 as mValue1", "value2 as mValue2")->where("vocabulary_id",$vid)->get();
        $fv = new FullVocabulary($vid,$title,$words);
        return $fv;
    }

    public function apiLangVocList($lid1,$lid2)
    {
        $res = Vocabulary::select("id as mId","title as mTitle")->where("language1_id",$lid1)->where("language2_id",$lid2)->get();
        return $res;
    }

}
