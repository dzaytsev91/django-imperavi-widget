<?php
// files storage folder
$dir = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/files/';

if (!file_exists($dir)) {
   mkdir($dir, 0777);
}


move_uploaded_file($_FILES['file']['tmp_name'], $dir.$_FILES['file']['name']);

$array = array(
    'filelink' => '/public/uploads/files/'.$_FILES['file']['name'],
    'filename' => $_FILES['file']['name']
);

echo stripslashes(json_encode($array));
?>