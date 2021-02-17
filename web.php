<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
</head>
<body>
  <table>   
    <?php 
    require_once("config.php");
    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$link) {
        echo 'I can not connect to the database. Error code: ' . mysqli_connect_error() . ', error: ' . mysqli_connect_error();
        exit;
      }
      $sql = mysqli_query($link, 'SELECT IP, name, speed, FROM_UNIXTIME(timestamp) AS time, a_frames_failed/a_frames_decoded*100 AS "a", v_frames_failed/v_frames_decoded*100 AS "v" FROM data LIMIT 500');?>
      <tr><th>IP</th><th>Network Name</th><th>Network speed</th><th>Timestamp</th><th>Audio errors</th><th>Video errors</th></tr>
      <?php 
      while ($result = mysqli_fetch_array($sql)) {
        echo "<tr><td>".long2ip($result['IP'])."</td><td>{$result['name']}</td><td>{$result['speed']}</td><td>{$result['time']}</td><td>{$result['a']}</td><td>{$result['v']}</td></tr>";
      };
  ?>
</body>
<style>
  *{
    margin: 0;
    padding:0;
    box-sizing: border-box;
  }
  table {
  font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  font-size: 14px;
  border-radius: 10px;
  border-spacing: 0;
  text-align: center;
  margin:0px auto;
  
  }
  th {
  background: #BCEBDD;
  color: black;
  padding: 10px 20px;
  position: sticky;
  top:0px;
  }
  th, td {
  border-style: solid;
  border-width: 0 1px 1px 0;
  border-color: white;
  }
  th:first-child, td:first-child {
  text-align: left;
  }
  th:last-child {
  border-right: none;
  }
  td {
  padding: 10px 20px;
  background: #F8E391;
  }
  tr td:last-child {
  border-right: none;
  }
</style>
</html>
