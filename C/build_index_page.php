<!--***************************************
***		Ariel Levin
***		ariel.lvn89@gmail.com
***		http://about.me/ariel.levin
****************************************-->

<?php

$fh = @ fopen($output_folder.'index.html', 'w') or die("can't open file");

fwrite($fh, "<html>\n");
fwrite($fh, "<head>\n");
fwrite($fh, "	<title>Places I've Been</title>\n");
fwrite($fh, "</head>\n");
fwrite($fh, "<body background='./pics/bg.jpg' vlink='#1a68b1'>\n");
fwrite($fh, "	<center>\n");
fwrite($fh, "	<marquee direction='right' behavior='alternate' scrollamount='8'><h1><font face='Calibri' color='#0b267d'>Places I've Been</font></h1></marquee>\n");
fwrite($fh, "	<br/><br/>\n");
fwrite($fh, "	<font face='Calibri' size='5' color='#0b267d'><b>\n");

for ($i = 1 , $counter = 0 ; $i <= $pages['num_dest']; $i++) {
	if (isset($pages[$i])) {
		$counter++;
		fwrite($fh, "	<a href='./".$pages[$i]['fixed-title']."/index.html'>".$pages[$i]['title']."</a>\n");
		if ($counter < $pages['num_dest_active']) {
			if ($counter % 5 == 0)
				fwrite($fh, "	<br/>\n");
			else
				fwrite($fh, "	&nbsp; | &nbsp;\n");
		}
	}
}

fwrite($fh, "	</b></font>\n");
fwrite($fh, "	</center>\n");
fwrite($fh, "	<br/><br/><br/><br/><br/>\n");
fwrite($fh, "	<font face='Calibri' size='3' color='#0b267d'>\n");
fwrite($fh, "		<a href='http://about.me/ariel.levin' target='_blank'>\n");
fwrite($fh, "			<b>&copy;Ariel Levin</b>\n");
fwrite($fh, "		</a>\n");
fwrite($fh, "	</font><br/><br/>\n");
fwrite($fh, "</body>\n");
fwrite($fh, "</html>\n");

fclose($fh);

?>