<?php
/**
 * User: jens.knobloch
 */
include_once 'processing_file.php';

/**
 * Aufgabenstellung:
 * Ich bräuchte von dir ein CommandLineProgramm, dass folgende Dinge mit dieser Datei (oder einer beliebigen anderen Datei) tut,
 * die über einzelne Befehle aufrufbar sind. Also sprich "php script.php <befehlname> <dateiname>":
 * - Die Worte zählt und sie auf der Console ausgibt.
 * - Die Worte auf der Console ausgibt und jeweils die Anzahl des Vorkommens direkt dahinter. Also "Wortx 122" dann nächste Zeile "Worty 345"
 * - Das gleiche für Buchstaben. Also "A 1456" dann neue Zeile und "B 3848". Groß/Kleinschreibung dabei ignorieren.
 * - Den Text nimmt, alle Leerzeichen entfernt und die Buchstaben dann einmal absteigend sortier. Dann einmal aufsteigend.
 *
 * Jeweils über einen dritten Parameter im Befehl. Also "php script.php <befehlname> <sortierungsRichtung> <dateiname>"
 */

//declare / init given params
$valid_commands  = array('countwords','countwordsrate','countlettersrate','dumpletters','sort');
$valid_sortorder = array('desc' => 1,'asc' => 0);
$hint            = "NOTICE: run script note correct order - php command filename (sortorder)";

$name_of_script  = $argv[0]; //not needed
$command         = isset($argv[1]) ? $argv[1] : ''; // Command
$textfile        = isset($argv[2]) ? $argv[2] : ''; // File
$sortorder       = isset($argv[3]) ? $argv[3] : ''; // Sortorder
$check           = true;



//check whether file exists
if (!$textfile){
    echo "\n";
    echo "File not found or not exists\n" . $hint;
    $check = false;
    exit();
}

//check whether given command is valid
if (empty($command) || !in_array($command,$valid_commands)){
    echo "\n";
    echo "Command not valid or not given\n" . $hint;
    $check = false;
    exit();
}

//there is a third parameter
if(!empty($sortorder) && !array_key_exists($sortorder,$valid_sortorder)){
    echo "\n";
    echo "Sortorder not valid \n" . $hint . "\n use asc or desc\n";
    $check = false;
    exit();
}

//processing file content
if($check){
    $file_content = file_get_contents($textfile);
}

switch ($command) {
    case $valid_commands[0];
        echo "File contents " . print_r(content_count_words($file_content), 1) . " Words!";
        break;
    case $valid_commands[1];
        foreach (content_count_words_occurance($file_content) as $key => $value) {
            echo "Word '" . $key . "' occurs " . $value . " x \n";
        }
        break;
    case $valid_commands[2];
        foreach (count_letters($file_content) as $key => $value) {
            echo chr($key) . " occurs (char: $key) " . $value . " x \n";
        }
        break;
    case $valid_commands[3];
        echo dump_letters($file_content,$valid_sortorder[$sortorder]);
        break;
}