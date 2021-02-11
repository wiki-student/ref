<?php
$connect = mysql_connect("localhost","root","") or die('Database Not Connected. Please Fix the Issue! ' . mysql_error());
mysql_select_db("test4", $connect);
$jsonCont = file_get_contents('IPTV.json');
$content = json_decode($jsonCont, true);
$id = $content['0']['id'];
$frames_decoded = $content['0']['video']['frames_decoded'];
$query = "INSERT INTO stat(id, frames_decoded)
VALUES('$id','$frames_decoded') ";
if(!mysql_query($query,$connect)) { die('Error : Query Not Executed. Please Fix the Issue! ' . mysql_error()); } else{ echo "Data Inserted Successully!!!"; }
var_dump ($content);
?>
