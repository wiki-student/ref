<?php
  require_once "config.php";
  __log( $_SERVER['REMOTE_ADDR']);
  $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
  $content = json_decode(file_get_contents('php://input'),true);
  $IP = ip2long($_SERVER['REMOTE_ADDR']);
  $x = -1;
  $y = 0;
  while ($x++<5):
    if ($content[$x]['type']=='media') {$m_content = $content[$x]; $y++;}
    elseif ($content[$x]['type']=='network'&& $content[$x]['stat']
    ['received_bytes']>0) $n_content = $content[$x];
  endwhile;
  if ($y<2){
   $url = $m_content['url'];
   $memcache = new Memcache;
   $memcache->connect('localhost', 11211);
   $url_id = ($memcache->get($url));
   if ($url_id<>0){
     }else{
        $query_mem = "INSERT into Url_Id (url) Values('$url')";
        $connect_mem = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
        mysqli_query($connect_mem,$query_mem);
        $url_id = mysqli_insert_id($connect_mem);
        mysqli_close($connect_mem);
        $memcache -> set($url,$url_id);
    }
  }
  if ($y<2)
  {
    $adaptive_bandwidth = $m_content['adaptive_bandwidth'];
    $begin = $m_content['begin'];
    $end = $m_content['end'];
    $a_frames_decoded = $m_content['audio']['frames_decoded'];
    $a_frames_dropped = $m_content['audio']['frames_dropped'];
    $a_frames_failed = $m_content['audio']['frames_failed'];
    $avg_bitrate = $m_content['avg_bitrate'];
    $id = $m_content['id'];
    $timestamp = $m_content['timestamp'];
    $v_frames_decoded = $m_content['video']['frames_decoded'];
    $v_frames_dropped = $m_content['video']['frames_dropped'];
    $v_frames_failed = $m_content['video']['frames_failed'];
    $type = $m_content['type'];
    $discontinuties = $m_content['discontinuties'];
    $duplex = $n_content['duplex'];
    $gateway = ip2long($n_content['gateway']);
    $ip_inner = ip2long($n_content['ip']);
    $name = $n_content['name'];
    $netmask = ip2long($n_content['netmask']);
    $speed = $n_content['speed'];
    $received_bytes = $n_content['stat']['received_bytes'];
    $received_discard_packets = $n_content['stat']['received_discard_packets'];
    $received_error_packets = $n_content['stat']['received_error_packets'];
    $received_multicast_packets = $n_content['stat']['received_multicast_packets'];
    $received_total_packets = $n_content['stat']['received_total_packets'];
    $sent_bytes = $n_content['stat']['sent_bytes'];
    $sent_error_packets = $n_content['stat']['sent_error_packets'];
    $sent_total_packets = $n_content['stat']['sent_total_packets'];
    $timestamp = $n_content['timestamp'];
    $type_net = $n_content['type'];
    $query = "INSERT INTO data (
                                begin,
                                end,
                                adaptive_bandwidth,
                                a_frames_decoded,
                                a_frames_dropped,
                                a_frames_failed,
                                avg_bitrate,
                                id,
                                timestamp,
                                v_frames_decoded,
                                v_frames_dropped,
                                v_frames_failed,
                                type,
                                discontinuties,
                                IP,
                                Url_Id,
                                duplex,
                                gateway,
                                IP_inner,
                                name,
                                netmask,
                                speed,
                                received_bytes,
                                received_discard_packets,
                                received_error_packets,
                                received_multicast_packets,
                                received_total_packets,
                                sent_bytes, sent_error_packets,
                                sent_total_packets,timestamp_net,
                                type_net)
                                VALUES(
                                '$begin',
                                '$end',
                                '$adaptive_bandwidth',
                                '$a_frames_decoded',
                                '$a_frames_dropped',
                                '$a_frames_failed',
                                '$avg_bitrate', '$id',
                                '$timestamp',
                                '$v_frames_decoded',
                                '$v_frames_dropped',
                                '$v_frames_failed',
                                '$type',
                                '$discontinuties',
                                '$IP',
                                '$url_id',
                                '$duplex',
                                '$gateway',
                                '$ip_inner',
                                '$name',
                                '$netmask',
                                '$speed',
                                '$received_bytes',
                                '$received_discard_packets',
                                '$received_error_packets',
                                '$received_multicast_packets',
                                '$received_total_packets',
                                '$sent_bytes',
                                '$sent_error_packets',
                                '$sent_total_packets',
                                '$timestamp',
                                '$type_net')";
    __log($query);
    $connect = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    mysqli_query($connect,$query);
    mysqli_close($connect);
  }
    function __log($msg)
    {
    error_log(date("Y-m-d H:i:s")."   ".$msg."\n",3,"/tmp/stb_stat.log");
    }
?>
