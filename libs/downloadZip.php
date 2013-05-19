<?php 

$DIR = '/var/lib/tomcat6/webapps/khan/exercises/';



$fh = fopen($DIR . $name . ".html", 'w') or exit("Unable to open file!");
fwrite($fh, $super_String);
fclose($fh);

$files = scandir($DIR);
$final_files = array();
$names = array();

foreach ($files as $file) {
    if($file[2] == '_'){
        array_push($final_files, $DIR.$file);
        array_push($names, $file);
    }
}

$zipname = $DIR . 'exercises.zip';

$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);
for ($i = 0; $i < count($names); $i++) {
    $zip->addFile($final_files[i], $names[i]);
}
$zip->close();


header('Content-Type: application/zip');
header('Content-disposition: attachment; filename=exercises.zip');
header('Content-Length: ' . filesize($zipname));
readfile($zipname);

