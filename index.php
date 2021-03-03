<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Page Title</title>
</head>
<body>
    <p>
      <form action="web.php" method="post">
        From: <input type="datetime-local" name="from"/>
        To: <input type="datetime-local" name="to"/>
        IP: <input type="text" name="ip"/>
        <input type="submit"/>
      </form>
    </p>
    <?php
      require_once("config.php");      
      $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
      if (!$link) 
      {
      echo 'I can not connect to the database. Error code: ' . mysqli_connect_error() . '';
        exit;
      }
      $r_count = mysqli_query($link, 'SELECT count(IP) FROM data');
      $uniq_IP = mysqli_query($link, 'SELECT count(DISTINCT IP) FROM data ');
      $top = mysqli_query($link, 'SELECT url, COUNT(*) FROM data GROUP BY url order BY COUNT(*) DESC');
      $row= $r_count->fetch_array();      
      echo "Total number of rows:".$row[0]."<br>";
      $row= $uniq_IP->fetch_array();
      echo "Unique IP:".$row[0]."<br>";
      while($i<=4){
        $row= mysqli_fetch_array($top);        
        echo $row['COUNT(*)'].' ';
        echo $row['url']."<br>";
        $i++;
      }
    ?>
</body>
</html>
