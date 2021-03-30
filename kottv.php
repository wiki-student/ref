<?php
    require_once("config.php");
    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $kottv_url = 'http://localhost:18883/217.21.34.193...';
    $from=time()-300;
    $to=time();
        $sql = "SELECT count(url_cache.Url), url_id from data
          inner join url_cache on url_id = url_cache.id
          WHERE url = '$kottv_url' and timestamp>= '$from' AND timestamp<= '$to'";
    $result = mysqli_query($link, $sql);
    $row= mysqli_fetch_array($result);
    echo $row['count(url_cache.Url)'].' ';
?>
