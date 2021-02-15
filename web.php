<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
</head>
<body>
  <table border="1">   
    <?php 
    require_once("config1.php");
    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$link) {
        echo 'I can not connect to the database. Error code: ' . mysqli_connect_error() . ', error: ' . mysqli_connect_error();
        exit;
      }
      $sql = mysqli_query($link, 'SELECT begin, a_frames_decoded, end, type FROM data');?>
      <tr><th>begin</th><th>a_frames_decoded</th><th>end</th><th>type</th></tr>
      <?php 
      while ($result = mysqli_fetch_array($sql)) {
        echo "<tr><td>{$result['begin']}</td><td>{$result['a_frames_decoded']}</td><td>{$result['end']}</td><td>{$result['type']}</td></tr>";
      }
  ?>
</body>
</html>

