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
    $from =strtotime($_POST['from']);
    $to = strtotime($_POST['to']);
    require_once("config.php");
    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$link) {
        echo 'I can not connect to the database. Error code: ' . mysqli_connect_error() . ', error: ' . mysqli_connect_error();
        exit;
      };
      $result = mysqli_query($link, 'SELECT *FROM `data` WHERE  `timestamp`>= '.$from.' AND `timestamp`<= '.$to.'');?>
      <tr><th>IP</th><th>Network Name</th><th>Network speed</th><th>Timestamp</th><th>Audio errors</th><th>Video errors</th></tr>
      <?php 
      function errors($a,$b){
        return round($a/$b*100,5);
      }
      function time1($t){
        return date('Y-m-d H:i:s',$t);
      }      
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>".long2ip($row['IP'])."</td><td>{$row['name']}</td><td>{$row['speed']}</td><td>".time1($row['timestamp'])."</td>
        <td>".errors($row['a_frames_failed'],$row['a_frames_decoded'])."</td><td>".errors($row['v_frames_failed'],$row['v_frames_decoded'])."</td></tr>";
      };
    ?>
    </table>
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
