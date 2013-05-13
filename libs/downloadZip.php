<?php 
echo "hello";

/*
$files = array('createExercise.php', 'editVariable.php');
$zipname = 'file.zip';



$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);
foreach ($files as $file) {
	$zip->addFile($file);
}
$zip->close();


header('Content-Type: application/zip');
header('Content-disposition: attachment; filename=filename.zip');
header('Content-Length: ' . filesize($zipname));
readfile($zipname);*/