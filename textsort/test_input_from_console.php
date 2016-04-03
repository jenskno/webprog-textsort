<?php
error_reporting(E_ALL);

include_once 'processing_file.php';

if ($argv[1]){

    $datei = trim($argv[1]);// ." ...";
}

if (file_exists($datei)) {
    //echo $argv[1] .  " gefunden";
    $arr = mirror_content(file_get_contents($datei));
    foreach ($arr as $key => $value) {
        echo "Wort: $key kommt $value mal vor\n";
    }
} else {
    echo $argv[1] . " nicht gefunden";
}
