<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Top sites</title>
</head>
<body>
    <p>
      <form action="top.php" method="post">
        From: <input type="datetime-local" name="from"/>
        To: <input type="datetime-local" name="to"/>
        IP: <input type="text" name="ip"/>
        <input type="submit"/>
      </form>
    </p>    
    <?php
    $from =strtotime($_POST['from']);
    $to = strtotime($_POST['to']);
    $ip = ip2long($_POST['ip']);
    require_once("config.php");
    if($from<>'' || $to<>'' || $ip<>'')
    { 
        $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
          if (!$link) 
          {
          echo 'I can not connect to the database. Error code:' . mysqli_connect_error() . '';
          exit;
          }   
        if($from==''){
          $from=1;
        }
        if($to==''){
          $to=time();
        }
        if($ip==''){
          $top = mysqli_query($link, 'SELECT url, COUNT(*) FROM data
           WHERE timestamp>= '.$from.' AND timestamp<= '.$to.' 
            GROUP BY url order BY COUNT(*) DESC');          
        }else{  
          $top = mysqli_query($link, 'SELECT url, COUNT(*) FROM data 
           WHERE timestamp>= '.$from.' AND timestamp<= '.$to.' AND IP= '.$ip.' 
            GROUP BY url order BY COUNT(*) DESC');}
        echo 'Top sites:'."</br>";
        while($i<=24){
          $row= mysqli_fetch_array($top);        
          echo $row['COUNT(*)'].' ';
          echo $row['url']."<br>";
          $i++;
        }
    }
    ?>
</body>
</html>