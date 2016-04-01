<?php
/**
 * User: jens.knobloch
 */
ini_set('memory_limit', '-1');

function mirror_content($content){
    return $content;
}

function content_count_words($content){
    $satzzeichen = array('.',',');

    $content = explode(' ',str_replace($satzzeichen,'',$content));
    $counter = array();

    foreach($content as $word)
        if(isset($counter[$word]))
            $counter[$word]++;
        else
            $counter[$word] = 1;

    return $counter;
}


