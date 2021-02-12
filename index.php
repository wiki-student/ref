<html>
<head>
 <title>bd</title>
</head>
<body>
 <form method="POST" action="stat.php">
  <input type="hidden" name="json" value='[
   {
      "adaptive_bandwidth" : 83069344,
      "audio" : {
         "frames_decoded" : 90102,
         "frames_dropped" : 2,
         "frames_failed" : 2
      },
      "avg_bitrate" : 6414844,
      "begin" : 1613052065,
      "discontinuties" : 3,
      "end" : 1613053986,
      "id" : "",
      "proto" : "browser",
      "timestamp" : 1613053986,
      "type" : "media",
      "url" : "http://tv.tvsat.by:30000/BT1_HD/index.m3u8",
      "video" : {
         "frames_decoded" : 48014,
         "frames_dropped" : 18,
         "frames_failed" : 18
      }
   },
   {
      "duplex" : "full",
      "gateway" : "192.168.0.1",
      "ip" : "192.168.0.102",
      "name" : "eth0",
      "netmask" : "255.255.255.0",
      "speed" : 100,
      "stat" : {
         "received_bytes" : 3158655167,
         "received_discard_packets" : 0,
         "received_error_packets" : 0,
         "received_multicast_packets" : 673,
         "received_total_packets" : 10722550,
         "sent_bytes" : 202636296,
         "sent_error_packets" : 0,
         "sent_total_packets" : 2945048
      },
      "timestamp" : 1613053986,
      "type" : "network"
   },
   {
      "duplex" : "half",
      "gateway" : "",
      "ip" : "",
      "name" : "wlan0",
      "netmask" : "",
      "speed" : 0,
      "stat" : {
         "received_bytes" : 0,
         "received_discard_packets" : 0,
         "received_error_packets" : 0,
         "received_multicast_packets" : 0,
         "received_total_packets" : 0,
         "sent_bytes" : 2678,
         "sent_error_packets" : 0,
         "sent_total_packets" : 37
      },
      "timestamp" : 1613053986,
      "type" : "network"
   }
]
'/>
  <input type="submit" value="send"/>
 </form>
</body>
</html>
<?php 
    
?>