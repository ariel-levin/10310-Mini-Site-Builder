<!--***************************************
***		Ariel Levin
***		ariel.lvn89@gmail.com
***		http://about.me/ariel.levin
****************************************-->

<?php

if (!file_exists($output_folder.'pics')) {
    mkdir($output_folder.'pics', 0777, true);
}
if (!@copy($img_folder.'bg.jpg', $output_folder.'pics/bg.jpg')) {
    echo "ERROR: the file 'bg.jpg' is missing in folder 'B'..\n";
    endProgram(false);
}
if (!@copy($img_folder.'home.png', $output_folder.'pics/home.png')) {
    echo "ERROR: the file 'home.png' is missing in folder 'B'..\n";
    endProgram(false);
}

for ($i = 1; $i <= $pages['num_dest']; $i++) {

	if (isset($pages[$i])) {

		if (!file_exists($pages[$i]['dir'])) {
	    	mkdir($pages[$i]['dir'], 0777, true);
		}

		$fh = @ fopen($pages[$i]['dir'].'index.html', 'w') or die("can't open file");

		fwrite($fh, "<html>\n");
		fwrite($fh, "<head>\n");
		fwrite($fh, "	<title>".$pages[$i]['title']."</title>\n");
		fwrite($fh, "</head>\n");
		fwrite($fh, "<body background='../pics/bg.jpg' vlink='#1a68b1'>\n");
		fwrite($fh, "<center>\n");
		if ($pages[$i]['cover_img'] != '') {
			fwrite($fh, "<img src='".$pages[$i]['cover_img']."' width='780' height='270' border='3' title='".$pages[$i]['title']."' />\n");
		}
		fwrite($fh, "<h1><font face='Calibri' color='#0b267d'><u>".$pages[$i]['title']."</u></font></h1>\n");
		fwrite($fh, "<table width='850' cellpadding='15'>\n");

		for ($j = 1; $j <= $pages[$i]['num_places']; $j++) {

			if (isset($pages[$i]['places'][$j])) {
				fwrite($fh, "	<tr>\n");
				if ($pages[$i]['img_count'] > 0) {
					fwrite($fh, "		<td width='40%'>\n");
					if ($pages[$i]['places'][$j]['img'] != '') {
						fwrite($fh, "			<img src='".$pages[$i]['places'][$j]['img']."' width='400' height='300' border='2' title='".$pages[$i]['places'][$j]['name']."' />\n");
					}
					fwrite($fh, "		</td>\n");
				}
				if ($pages[$i]['img_count'] == 0)
					fwrite($fh, "		<td width='60%' align='center'>\n");
				else
					fwrite($fh, "		<td width='60%' align='left'>\n");
				fwrite($fh, "			<font face='Calibri' size='4' color='#2243ab'>\n");
				fwrite($fh, "			<h3><u>".$pages[$i]['places'][$j]['name'].":</u></h3>\n");
				fwrite($fh, "			".$pages[$i]['places'][$j]['desc']."\n");
				fwrite($fh, "			</font>\n");
				fwrite($fh, "		</td>\n");
				fwrite($fh, "	</tr>\n");
			}
		}

		fwrite($fh, "</table>\n");
		fwrite($fh, "<br/>\n");
		fwrite($fh, "<a href='../index.html'><img src='../pics/home.png' title='Home Page'/></a>\n");
		fwrite($fh, "</center>\n");
		fwrite($fh, "<br/>\n");
		fwrite($fh, "<font face='Calibri' size='3' color='#0b267d'>\n");
		fwrite($fh, "	<a href='http://about.me/ariel.levin' target='_blank'>\n");
		fwrite($fh, "		<b>&copy;Ariel Levin</b>\n");
		fwrite($fh, "	</a>\n");
		fwrite($fh, "</font><br/><br/>\n");
		fwrite($fh, "</body>\n");
		fwrite($fh, "</html>");	

		fclose($fh);
	}
}

?>