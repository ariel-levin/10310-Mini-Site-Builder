<!--***************************************
***		Ariel Levin
***		ariel.lvn89@gmail.com
***		http://about.me/ariel.levin
****************************************-->

<?php

include "functions.php";

$output_folder = '../D/';
$img_folder = '../B/';

cleanFolder($output_folder);


///////////////////////////////////////////////////////////////
/* store all data from user_input_form.php into $pages array */
///////////////////////////////////////////////////////////////

$pages = array();
$pages['num_dest'] = $_POST['num_dest'];
$pages['num_dest_active'] = 0;
for ($i = 1; $i <= $pages['num_dest']; $i++) {

	if ($_POST['title'.$i] != '') {

		$pages['num_dest_active']++;
		$pages[$i]['title'] = $_POST['title'.$i];
		$pages[$i]['fixed-title'] = fixName($pages[$i]['title']);
		$pages[$i]['num_places'] = $_POST['num_places'.$i];
		$pages[$i]['dir'] = $output_folder.$pages[$i]['fixed-title'].'/';

		$filename = 'cover'.$i;
		$pages[$i]['cover_img'] = $_FILES[$filename]["name"];
		if ($_FILES[$filename]['name'] != '') {
			include "file_check_and_upload.php";
			if (! $success)
				endProgram(false);
		}

		$pages[$i]['img_count'] = 0;
		$pages[$i]['places'] = array();
		for ($j = 1; $j <= $pages[$i]['num_places']; $j++) {

			if ($_POST['place'.$i.'_'.$j.'_name'] != '') {
				$pages[$i]['places'][$j] = array();
				$pages[$i]['places'][$j]['name'] = $_POST['place'.$i.'_'.$j.'_name'];
				$pages[$i]['places'][$j]['desc'] = $_POST['place'.$i.'_'.$j.'_desc'];

				$filename = 'place'.$i.'_'.$j.'_img';
				$pages[$i]['places'][$j]['img'] = $_FILES[$filename]["name"];

				if ($_FILES[$filename]['name'] != '') {
					include "file_check_and_upload.php";
					if ($success)
						$pages[$i]['img_count']++;
					else
						endProgram(false);
				}
			}
		}

	}
}

// var_dump($pages);
// var_dump($_FILES);


//////////////////////////////////////////////////////////////////////////////////

include "build_dest_pages.php";

include "build_index_page.php";

endProgram(true);

?>