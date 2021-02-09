<?php 
    require_once "config.php";
    $id = '3';
    $name = 'name';
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->exec("set names utf8");
    $data = array( 'id' => $id, 'name' => $name );
    $query = $db->prepare("INSERT INTO $db_table (id, name) values (:id, :name)");
    $query->execute($data);
?>