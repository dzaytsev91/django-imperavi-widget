<?php
namespace abeautifulsite;
use Exception;

require ('SimpleImage.php');

// files storage folder
$dir = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/img/';

if (!file_exists($dir)) {
   mkdir($dir, 0777);
}

if ($_FILES['file']['type'] == 'image/png'
|| $_FILES['file']['type'] == 'image/jpg'
|| $_FILES['file']['type'] == 'image/gif'
|| $_FILES['file']['type'] == 'image/jpeg'
|| $_FILES['file']['type'] == 'image/pjpeg')
{
    // setting file's mysterious name
    $file = md5(date('YmdHis')).'.jpg';
    // copying
    move_uploaded_file($_FILES['file']['tmp_name'], $dir.$file);
 
}

try {
	
	   
	//resize image and prev
	$img = new SimpleImage();
	$img->load($dir.$file)->resize(100, 72)->save($dir.'prev_'.$file);
	$img->load($dir.$file)->fit_to_width(750)->save($dir.$file);
	
	
	

    // displaying file
    $array = array(
        'filelink' => '/public/uploads/img/'.$file
    );
	$array_json = array(
        'thumb' => '/public/uploads/img/prev_'.$file,
		'image' => '/public/uploads/img/'.$file
    );
	
	$Last = file($dir."imageslist.json");//получаем массив строк из нашего файла
   $col = count($Last);//узнаем количество строк в текстовом файле
   if ($col>1){    
    unset($Last[$col-1]);//удаляем строку со скобками ограничивающими массив и объект JSON
	$Last[$col-1] = ",";
	}else{
    $Last[$col-1] = "[";
	}
    $Last[$col] = stripslashes(json_encode($array_json));
    $Last[$col + 1] = "\n]";//добавляем строку со скобками ограничивающими массив и объект JSON
    
    file_put_contents($dir."imageslist.json", $Last);

	
	
    echo stripslashes(json_encode($array));

} catch (Exception $e) {
	
}
?>