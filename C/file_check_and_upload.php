<!--***************************************
***		Ariel Levin
***		ariel.lvn89@gmail.com
***		http://about.me/ariel.levin
****************************************-->

<?php

if (!defined('MB')) {
	define('MB', 1048576);
}

$upload_dest = $pages[$i]['dir'];
$success = false;

$allowedExts = array (
	"gif",
	"jpeg",
	"jpg",
	"png"
);
$temp = explode(".", $_FILES[$filename]["name"]);
$extension = end($temp);

if ((	($_FILES[$filename]["type"] == "image/gif")		|| 
		($_FILES[$filename]["type"] == "image/jpeg") 	|| 
		($_FILES[$filename]["type"] == "image/jpg") 	|| 
		($_FILES[$filename]["type"] == "image/pjpeg") 	|| 
		($_FILES[$filename]["type"] == "image/x-png") 	|| 
		($_FILES[$filename]["type"] == "image/png")) 	&& 
		($_FILES[$filename]["size"] < 5*MB) 			&& 
		in_array($extension, $allowedExts)) {
			
	if ($_FILES[$filename]["error"] > 0) {
		echo "Return Code: " . $_FILES[$filename]["error"] . "<br/>\n";
	} else {
		$success = true;
		if (file_exists($upload_dest . $_FILES[$filename]["name"])) {
			echo $_FILES[$filename]["name"] . " already exists.<br/>\n";
		} else {
			if (!file_exists($upload_dest)) {
	    		mkdir($upload_dest, 0777, true);
			}
			move_uploaded_file($_FILES[$filename]["tmp_name"], $upload_dest.$_FILES[$filename]["name"]);
		}
	}
} else {
	echo "Invalid file extension or size, please try again\n";
}

?>