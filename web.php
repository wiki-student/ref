<?php 
   require_once("config.php");
    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$link) {
        echo 'I can not connect to the database. Error code: ' . mysqli_connect_error() . ', error: ' . mysqli_connect_error();
        exit;
      }
      $sql = mysqli_query($link, 'SELECT `adaptive_bandwidth`, `a_frames_decoded`, `a_frames_dropped`, `a_frames_failed`, `avg_bitrate`, `begin`,`discontinuties`,`end`,`id`,`proto`,`timestamp`,`type`,`v_frames_decoded`, `v_frames_dropped`, `v_frames_failed`, 
      `f_gateway`, `f_ip`, `f_name`, `f_netmask`, `f_speed`, `f_s_received_bytes`, `f_s_received_discard_packets`, `f_s_received_error_packets`, `f_s_received_multicast_packets`, `f_s_received_total_packets`, `f_s_sent_bytes`, `f_s_sent_error_packets`, `f_s_sent_total_packets`, `f_timestamp`, `f_type`,
      `t_gateway`, `t_ip`, `t_name`, `t_netmask`, `t_speed`, `t_s_received_bytes`, `t_s_received_discard_packets`, `t_s_received_error_packets`, `t_s_received_multicast_packets`, `t_s_received_total_packets`, `t_s_sent_bytes`, `t_s_sent_error_packets`, `t_s_sent_total_packets`, `t_timestamp`, `t_type`  FROM `data`');
      while ($result = mysqli_fetch_array($sql)) {
        echo "{$result['adaptive_bandwidth']} {$result['a_frames_decoded']} {$result['a_frames_dropped']} {$result['avg_bitrate']} {$result['begin']} {$result['discontinuties']} {$result['end']} {$result['id']} {$result['proto']} {$result['timestamp']} {$result['type']} {$result['v_frames_decoded']} {$result['v_frames_dropped']} {$result['v_frames_failed']} 
        {$result['f_duplex']} {$result['f_gateway']} {$result['f_ip']} {$result['f_name']} {$result['f_netmask']} {$result['f_speed']} {$result['f_s_received_bytes']} {$result['f_s_received_discard_packets']} {$result['f_s_received_error_packets']} {$result['f_s_received_multicast_packets']} {$result['f_s_received_total_packets']} {$result['f_s_sent_bytes']} {$result['f_s_sent_error_packets']} {$result['f_s_sent_total_packets']} {$result['f_timestamp']} {$result['f_type']}
        {$result['t_duplex']} {$result['t_gateway']} {$result['t_ip']} {$result['t_name']} {$result['t_netmask']} {$result['t_speed']} {$result['t_s_received_bytes']} {$result['t_s_received_discard_packets']} {$result['t_s_received_error_packets']} {$result['t_s_received_multicast_packets']} {$result['t_s_received_total_packets']} {$result['t_s_sent_bytes']} {$result['t_s_sent_error_packets']} {$result['t_s_sent_total_packets']} {$result['t_timestamp']} {$result['t_type']} <br>";
      }
?>
