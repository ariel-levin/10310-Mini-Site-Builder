<!--***************************************
***		Ariel Levin
***		ariel.lvn89@gmail.com
***		http://about.me/ariel.levin
****************************************-->

<?php

function fixName($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}

function rrmdir($dir) {
	if (is_dir($dir)) {
		$objects = scandir($dir);
		foreach ($objects as $object) {
			if ($object != "." && $object != "..") {
				if (filetype($dir."/".$object) == "dir")
					rrmdir($dir."/".$object);
				else
					unlink($dir."/".$object);
			}
		}
		reset($objects);
		rmdir($dir);
	}
}

function cleanFolder($folder) {
	rrmdir($folder);
	if (!file_exists($folder)) {
	    mkdir($folder, 0777, true);
	}
}

function endProgram($success) {
	if ($success) {
		include "end_page.php";
	}
	else {
		cleanFolder('../D/');
		include "start_over.php";
	}
	exit;
}

?>