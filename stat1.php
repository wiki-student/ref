<?php 
    require_once "config.php";
    $s=json_decode(file_get_contents("IPTV.json"));
    $m_timestamp=($s->{"timestamp"});
    $url=($s->{"url"});
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->exec("set names utf8");
    $data = array( 'm_timestamp' => $m_timestamp, 'url' => $url );
    $query = $db->prepare("INSERT INTO stat(m_timestamp, url) values (:m_timestamp, :url)");
    $query->execute($data);
    echo $url;
    echo $s;
?>