<!--***************************************
***		Ariel Levin
***		ariel.lvn89@gmail.com
***		http://about.me/ariel.levin
****************************************-->

<?php

echo "<html>\n";
echo "<head>\n";
echo "<title>Places I've Been Builder</title>\n";
echo "<script type='text/JavaScript'>\n";

echo "	function changePage(num, where) {\n";
echo "		document.getElementById('div' + num).style.display = 'none';\n";
echo "		document.getElementById('div' + eval(num + where + 1)).style.display = 'block';\n";
echo "		document.getElementById('title' + eval(num + where + 1)).focus();\n";
echo "	}\n\n";

echo "	function changePlacesAmount(dest) {\n";
echo " 		var num_places = document.getElementById('num_places' + dest).value;\n";
echo " 		for (var i = 1 ; i <= 5 ; i++) {\n";
echo "			if (i <= num_places)\n";
echo "				document.getElementById('place' + dest + '_' + i).style.display = '';\n";
echo "			else\n";
echo "				document.getElementById('place' + dest + '_' + i).style.display = 'none';\n";
echo "		}\n";
echo "	}\n";

echo "</script>\n";
echo "</head>\n";

echo "<body bgcolor='#dfdfdf' vlink='#373737'>\n";
echo "	<br/>\n";
echo "	<div align='center'>\n";
echo "	<font face='Calibri' color='#373737'>\n";
echo "	<h1><b>Places I've Been Builder</b></h1>\n";

echo "	<form action='site_builder.php' method='post' enctype='multipart/form-data'>\n";

$num_dest = $_POST['num_dest'];

for ($i = 1 ; $i <= $num_dest ; $i++) {

	$display_dest = 'none';
	if ($i == 1)
		$display_dest = 'block';

	echo "		<div id='div$i' align='center' style='display: $display_dest;'>\n";
	echo "			<h2><center><b>Destination $i/$num_dest</b></center></h2>\n";
	echo " 			Please enter the destination name:<br/><br/>\n";
	if ($i == 1)
		echo "			<input id='title$i' name='title$i' type='text' autofocus /><br/><br/>\n";
	else
		echo "			<input id='title$i' name='title$i' type='text' /><br/><br/>\n";
	echo " 			Please select the destination cover picture:<br/><br/>\n";
	echo "			<input name='cover$i' type='file' /><br/><br/>\n";
	echo " 			Please select how many places have you been there:<br/><br/>\n";
	echo "			<select name='num_places$i' id='num_places$i' style='width:70px' onchange='changePlacesAmount($i)'>\n";
	echo "				<option value='1'>1</option>\n";
	echo "				<option value='2'>2</option>\n";
	echo "				<option value='3'>3</option>\n";
	echo "				<option value='4'>4</option>\n";
	echo "				<option value='5'>5</option>\n";
	echo "			</select>\n";
	echo "			<br/><br/><br/>\n";

	echo " 			<table align='center' width='80%' cellpadding='20'>\n";
	echo " 			<tr>\n";
	echo " 				<td align='center'><h3>Place Name</h3></td>\n";
	echo " 				<td align='center'><h3>Upload Image</h3></td>\n";
	echo " 				<td align='center'><h3>Write a Description</h3></td>\n";
	echo " 			</tr>\n";

	for ($j = 1 ; $j <= 5 ; $j++) {

		$display_place = 'none';
		if ($j == 1)
			$display_place = '';

		echo " 			<tr id='place".$i."_".$j."' style='display: $display_place;'>\n";
		echo " 				<td align='center' valign='top' width='20%'>\n";
		echo "					<input name='place".$i."_".$j."_name' type='text' />\n";
		echo " 				</td>\n";
		echo " 				<td align='center' valign='top' width='30%'>\n";
		echo "					<input name='place".$i."_".$j."_img' id='place".$i."_".$j."_img' type='file' style='width:190px' />\n";
		echo " 				</td>\n";
		echo " 				<td align='center' valign='top' width='50%'>\n";
		echo "					<textarea name='place".$i."_".$j."_desc' rows='10' style='width:100%'></textarea>\n";
		echo " 				</td>\n";
		echo " 			</tr>\n";
	}

	echo " 			</table>\n";
	echo "			<br/><br/>\n";

	if ($i > 1)
		echo "			<input type='button' value='Previous Page' onclick='changePage($i,".'"-"'.")' />&nbsp;&nbsp;&nbsp;\n";
	if ($i < $num_dest)
		echo "			<input type='button' value='Next Page' onclick='changePage($i,".'"+"'.")' />\n";
	if ($i == $num_dest)
		echo "			<input name='submit_website' type='submit' value='Finish and Create the Website' onclick=\"return confirm('Are you sure you want to finish and create the website?')\" />\n";

	echo "		</div>\n";
}

echo "		<input type='hidden' name='num_dest' value=$num_dest />\n";
echo "	</form>\n";
echo "	<form align='center' action='index.php' method='post'>\n";
echo "		<input type='submit' value='Delete and Start Over' onclick=\"return confirm('Are you sure you want to delete and start over?')\" />\n";
echo "	</form>\n";
echo "	<br/><br/>\n";
echo "	</font></div>\n";
echo "	<font face='Calibri' size='3' color='#373737'>\n";
echo "		<a href='http://about.me/ariel.levin' target='_blank'>\n";
echo "			<b>&copy;Ariel Levin</b>\n";
echo "		</a>\n";
echo "	</font><br/><br/>\n";
echo "</body>\n";
echo "</html>";

?>