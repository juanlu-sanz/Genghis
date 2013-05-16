<?php 

$DIR = '/var/lib/tomcat6/webapps/khan/exercises/';



$fh = fopen($DIR . $name . ".html", 'w') or exit("Unable to open file!");
fwrite($fh, $super_String);
fclose($fh);


$files = array('libs/createExercise.php', 'libs/editVariable.php');
$zipname = $DIR . 'exercises.zip';

$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);
foreach ($files as $file) {
    $zip->addFile($file);
}
$zip->close();


header('Content-Type: application/zip');
header('Content-disposition: attachment; filename=exercises.zip');
header('Content-Length: ' . filesize($zipname));
readfile($zipname);
