<?php 

$DIR = '/var/lib/tomcat6/webapps/khan/exercises/';

$files = scandir($DIR);
$final_files = array();
$names = array();

foreach ($files as $file) {
    if($file[2] == '_'){
        array_push($final_files, $DIR.$file);
        array_push($names, $file);
    }
}

$date = new DateTime();
$d = $date->format('_Y-m-d_H:i:s');

$zipname = $DIR . 'exercises'.$d.'.zip';

/*
echo '<pre>';
print_r($final_files);
print_r($names);
echo '</pre>';
 */

$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);
foreach ($final_files as $file) {
    $zip->addFile($file);
}
$zip->close();


header('Content-Type: application/zip');
header('Content-disposition: attachment; filename=exercises'.$d.'.zip');
header('Content-Length: ' . filesize($zipname));
readfile($zipname);

