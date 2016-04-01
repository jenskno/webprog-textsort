<?php
/**
 * User: jens.knobloch
 */
include_once 'processing_file.php';

//declare / init given params
$valid_commands  = array('countwords','countwordsrate','countletters','countlettersrate','sort');
$valid_sortorder = array('desc','asc');
$hint            = "NOTICE: run script note correct order - php command filename (sortorder)";

$name_of_script  = $argv[0]; //not needed
$command         = isset($argv[1]) ? $argv[1] : ''; // Command
$file            = isset($argv[2]) ? $argv[2] : ''; // File
$sortorder       = isset($argv[3]) ? $argv[3] : ''; // Sortorder
$check           = true;

$file = 'testcase.txt';


//check whether file exists
if (empty($file) || !file_exists($file)){
    echo "\n";
    echo "File not found or not exists\n" . $hint;
    $check = false;
    exit();
}

$command = 'countwordsrate';

//check whether given command is valid
if (empty($command ) || !in_array($command,$valid_commands)){
    echo "\n";
    echo "Command not valid or not given\n" . $hint;
    $check = false;
    exit();
}

//processing file content
if($check){
    $file_content = file_get_contents($file);
}

switch ($command){
    case $valid_commands[0];
        echo "File contents " . content_count_words($file_content). " Words!";
        break;
    case $valid_commands[1];
        print_r (content_count_words($file_content,1));
        break;
    case $valid_commands[2];
        echo "command was 2 " . $command;
        break;
    case $valid_commands[3];
        echo "command was 3 " . $command;
        break;
    case $valid_commands[4];
        echo "command was 4 " . $command;
        break;
}