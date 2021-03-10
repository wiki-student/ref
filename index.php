<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Index</title>
</head>
<body>    
    <?php
      require_once("config.php");      
      $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
      if (!$link) 
      {
      echo 'I can not connect to the database. Error code: ' . mysqli_connect_error() . '';
        exit;
      };
      $r_count = mysqli_query($link, 'SELECT count(IP) FROM data');
      $uniq_IP = mysqli_query($link, 'SELECT count(DISTINCT IP) FROM data ');
      $row= $r_count->fetch_array();      
      echo "Total number of rows:".$row[0]."<br>";
      $row= $uniq_IP->fetch_array();
      echo "Unique IP:".$row[0]."<br>";
    ?>
    <a href="web.php">Full table</a></br>
    <a href="top.php">Top</a>
</body>
</html>
