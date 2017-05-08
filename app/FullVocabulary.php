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
    private $mTitle;
    private $mWords;

    function __construct($title, $words)
    {
        $this->mTitle = $title;
        $this->mWords = $words;
    }

    function __toString()
    {
        return "{\"mTitle\":\"".$this->mTitle."\", \"mWords\":".$this->mWords."}";
    }
}