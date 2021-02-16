<?php
require_once "config.php";
__log( $_SERVER['REMOTE_ADDR']);
$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
$content = json_decode(file_get_contents('php://input'), true);
$IP = ip2long($_SERVER['REMOTE_ADDR']);
switch ($content['0']['type']) {
    case 'media':
      $x=0;
       break;}
switch ($content['0']['type']) {
    case 'network':
       if ($content['0']['stat']['received_bytes'] >0) $y=0;
       break;}
switch ($content['1']['type']) {
    case 'network':
       if ($content['1']['stat']['received_bytes'] >0) $y=1;
       break;}
switch ($content['2']['type']) {
    case 'network':
       if ($content['2']['stat']['received_bytes'] >0) $y=2;
       break;}
$adaptive_bandwidth = $content[$x]['adaptive_bandwidth'];
$begin = $content[$x]['begin'];
$end = $content[$x]['end'];
$a_frames_decoded = $content[$x]['audio']['frames_decoded'];
$a_frames_dropped = $content[$x]['audio']['frames_dropped'];
$a_frames_failed = $content[$x]['audio']['frames_failed'];
$avg_bitrate = $content[$x]['avg_bitrate'];
$id = $content[$x]['id'];
$timestamp = $content[$x]['timestamp'];
$v_frames_decoded = $content[$x]['video']['frames_decoded'];
$v_frames_dropped = $content[$x]['video']['frames_dropped'];
$v_frames_failed = $content[$x]['video']['frames_failed'];
$type = $content[$x]['type'];
$discontinuties = $content[$x]['discontinuties'];
$duplex = $content[$y]['duplex'];
$gateway = $content[$y]['gateway'];
$ip = $content[$y]['ip'];
$name = $content[$y]['name'];
$netmask = $content[$y]['netmask'];
$speed = $content[$y]['speed'];
$received_bytes = $content[$y]['stat']['received_bytes'];
$received_discard_packets = $content[$y]['stat']['received_discard_packets'];
$received_error_packets = $content[$y]['stat']['received_error_packets'];
$received_multicast_packets = $content[$y]['stat']['received_multicast_packets'];
$received_total_packets = $content[$y]['stat']['received_total_packets'];
$sent_bytes = $content[$y]['stat']['sent_bytes'];
$sent_error_packets = $content[$y]['stat']['sent_error_packets'];
$sent_total_packets = $content[$y]['stat']['sent_total_packets'];
$timestamp = $content[$y]['timestamp'];
$type = $content[$y]['type'];
$query = "INSERT INTO data (begin, end, adaptive_bandwidth, a_frames_decoded, a_frames_dropped, a_frames_failed, avg_bitrate, id, timestamp, v_frames_decoded, v_frames_dropped, v_frames_failed, type, discontinuties, IP,
  f_duplex, f_gateway, f_ip, f_name, f_netmask, f_speed, f_s_received_bytes, f_s_received_discard_packets, f_s_received_error_packets, f_s_received_multicast_packets, f_s_received_total_packets, f_s_sent_bytes, f_s_sent_error_packets, f_s_sent_total_packets,f_timestamp, f_type)
VALUES('$begin', '$end','$adaptive_bandwidth','$a_frames_decoded', '$a_frames_dropped', '$a_frames_failed','$avg_bitrate', '$id', '$timestamp', '$v_frames_decoded', '$v_frames_dropped', '$v_frames_failed','$type','$discontinuties', '$IP',
 '$duplex','$gateway','$ip','$name','$netmask','$speed','$received_bytes','$received_discard_packets','$received_error_packets','$received_multicast_packets','$received_total_packets','$sent_bytes','$sent_error_packets','$sent_total_packets','$timestamp','$type')";
__log($query);
$connect = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
mysqli_query($connect,$query);
mysqli_close($connect);
function __log($msg) {
  error_log(date("Y-m-d H:i:s")."   ".$msg."\n",3,"/tmp/stb_stat.log");}
?>
