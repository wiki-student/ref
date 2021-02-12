<?php
$connect = mysql_connect("localhost","root","") or die('Database Not Connected. Please Fix the Issue! ' . mysql_error());
mysql_select_db("iptv2", $connect);
$jsonCont = file_get_contents('TVIP.json');
$content = json_decode($jsonCont, true);
$adaptive_bandwidth = $content['0']['adaptive_bandwidth'];
$begin = $content['0']['begin'];
$end = $content['0']['end'];
$a_frames_decoded = $content['0']['audio']['frames_decoded'];
$a_frames_dropped = $content['0']['audio']['frames_dropped'];
$a_frames_failed = $content['0']['audio']['frames_failed'];
$avg_bitrate = $content['0']['avg_bitrate'];
$id = $content['0']['id'];
$timestamp = $content['0']['timestamp'];
$v_frames_decoded = $content['0']['video']['frames_decoded'];
$v_frames_dropped = $content['0']['video']['frames_dropped'];
$v_frames_failed = $content['0']['video']['frames_failed'];
$type = $content['0']['type'];
$discontinuties = $content['0']['discontinuties'];
$f_duplex = $content['1']['duplex'];
$f_gateway = $content['1']['gateway'];
$f_ip = $content['1']['ip'];
$f_name = $content['1']['name'];
$f_netmask = $content['1']['netmask'];
$f_speed = $content['1']['speed'];
$f_s_received_bytes = $content['1']['stat']['received_bytes'];
$f_s_received_discard_packets = $content['1']['stat']['received_discard_packets'];
$f_s_received_error_packets = $content['1']['stat']['received_error_packets'];
$f_s_received_multicast_packets = $content['1']['stat']['received_multicast_packets'];
$f_s_received_total_packets = $content['1']['stat']['received_total_packets'];
$f_s_sent_bytes = $content['1']['stat']['sent_bytes'];
$f_s_sent_error_packets = $content['1']['stat']['sent_error_packets'];
$f_s_sent_total_packets = $content['1']['stat']['sent_total_packets'];
$f_timestamp = $content['1']['timestamp'];
$f_type = $content['1']['type'];
$t_duplex = $content['2']['duplex'];
$t_gateway = $content['2']['gateway'];
$t_ip = $content['2']['ip'];
$t_name = $content['2']['name'];
$t_netmask = $content['2']['netmask'];
$t_speed = $content['2']['speed'];
$t_s_received_bytes = $content['2']['stat']['received_bytes'];
$t_s_received_discard_packets = $content['2']['stat']['received_discard_packets'];
$t_s_received_error_packets = $content['2']['stat']['received_error_packets'];
$t_s_received_multicast_packets = $content['2']['stat']['received_multicast_packets'];
$t_s_received_total_packets = $content['2']['stat']['received_total_packets'];
$t_s_sent_bytes = $content['2']['stat']['sent_bytes'];
$t_s_sent_error_packets = $content['2']['stat']['sent_error_packets'];
$t_s_sent_total_packets = $content['2']['stat']['sent_total_packets'];
$t_timestamp = $content['2']['timestamp'];
$t_type = $content['2']['type'];
$query = "INSERT INTO data(begin, end, adaptive_bandwidth, a_frames_decoded, a_frames_dropped, a_frames_failed, avg_bitrate, id, timestamp, v_frames_decoded, v_frames_dropped, v_frames_failed, type, discontinuties,
  f_duplex, f_gateway, f_ip, f_name, f_netmask, f_speed, f_s_received_bytes, f_s_received_discard_packets, f_s_received_error_packets, f_s_received_multicast_packets, f_s_received_total_packets, f_s_sent_bytes, f_s_sent_error_packets, f_s_sent_total_packets,f_timestamp, f_type,
  t_duplex, t_gateway, t_ip, t_name, t_netmask, t_speed, t_s_received_bytes, t_s_received_discard_packets, t_s_received_error_packets, t_s_received_multicast_packets, t_s_received_total_packets, t_s_sent_bytes, t_s_sent_error_packets, t_s_sent_total_packets,t_timestamp, t_type)
VALUES('$begin', '$end','$adaptive_bandwidth','$a_frames_decoded', '$a_frames_dropped', '$a_frames_failed','$avg_bitrate', '$id', '$timestamp', '$v_frames_decoded', '$v_frames_dropped', '$v_frames_failed','$type','$discontinuties',
 '$f_duplex','$f_gateway','$f_ip','$f_name','$f_netmask','$f_speed','$f_s_received_bytes','$f_s_received_discard_packets','$f_s_received_error_packets','$f_s_received_multicast_packets','$f_s_received_total_packets','$f_s_sent_bytes','$f_s_sent_error_packets','$f_s_sent_total_packets','$f_timestamp','$f_type',
 '$t_duplex','$t_gateway','$t_ip','$t_name','$t_netmask','$t_speed','$t_s_received_bytes','$t_s_received_discard_packets','$t_s_received_error_packets','$t_s_received_multicast_packets','$t_s_received_total_packets','$t_s_sent_bytes','$t_s_sent_error_packets','$t_s_sent_total_packets','$t_timestamp', '$t_type')";
if(!mysql_query($query,$connect)) { die('Error : Query Not Executed. Please Fix the Issue! ' . mysql_error()); } else{ echo "Data Inserted Successully!!!"; }
var_dump ($content);
?>
