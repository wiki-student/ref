<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Page Title</title>
</head>
<body>
    <p>
      <form action="web.php" method="post">
        From: <input type="text" name="from"/>
        To: <input type="text" name="to"/>
        <input type="submit"/>
      </form>
    </p>
    <p>
      <form action="web.php" method="post">
        IP: <input type="text" name="ip"/>
        <input type="submit"/>
      </form>
    </p>
    <p>
      <form action="web.php">
        <button type="submit">View all the data</button>
      </form>
    </p>
    <?php
      require_once("config.php");      
      $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
      if (!$link) 
      {
      echo 'I can not connect to the database. Error code: ' . mysqli_connect_error() . '
        , error: ' . mysqli_connect_error();
        exit;
      }
      $r_count = mysqli_query($link, 'SELECT count(IP) FROM data');
      $uniq_IP = mysqli_query($link, 'SELECT count(DISTINCT IP) FROM data ');
      $row= $r_count->fetch_array();
      echo "Total number of rows:".$row[0]."<br>";
      $row= $uniq_IP->fetch_array();
      echo "Unique IP:".$row[0]."<br>";
    ?>
  </table>
</body>
</html>
