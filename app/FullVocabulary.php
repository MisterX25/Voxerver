<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 08.05.17
 * Time: 09:19
 * Purpose: Wrap the voc title and the words of the voc
 */

namespace App;


class FullVocabulary
{
    private $mId;
    private $mTitle;
    private $mWords;

    function __construct($id, $title, $words)
    {
        $this->mId = $id;
        $this->mTitle = $title;
        $this->mWords = $words;
    }

    function __toString()
    {
        return "{\"mId\":\"".$this->mId."\", \"mTitle\":\"".$this->mTitle."\", \"mWords\":".$this->mWords."}";
    }
}