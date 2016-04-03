<?php
/**
 * User: jens.knobloch
 */
// for the big file ;)
//ini_set('memory_limit', '-1');

function content_count_words_occurance($content=''){
    return array_count_values(str_word_count(cleanup_string($content), 1));
}

function content_count_words($content){
    return str_word_count(cleanup_string($content));
}

function count_letters($content=''){
    return count_chars(cleanup_string(strtolower($content),1),1);
}

function dump_letters($content='',$sortorder=0){
    $stringParts = str_split(cleanup_string(strtolower($content),1));

    switch($sortorder){
        case 0:
            sort($stringParts);
            break;
        case 1:
            rsort($stringParts);
            break;
        default:
            sort($stringParts);
            break;
    }
    return implode('', $stringParts);
}


//helper
function cleanup_string($content='',$flag=0){
    $satzzeichen = array('.',',','\'','"',':',';',Chr(13),Chr(10));
    if($flag == 1){
        //remove white spaces
        $satzzeichen[] = " "; //add one element
    }
    return str_replace($satzzeichen,'',$content);
}


