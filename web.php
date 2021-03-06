<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Audio/video errors</title>
</head>
<body>
  <table>
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
      $from =strtotime($_POST['from']);
      $to = strtotime($_POST['to']);
      $ip = ip2long($_POST['ip']);
      function cutletters($l)
      {
        $l = str_replace("http://","",$l);
        $l = str_replace("index.m3u8","",$l);
        if (strlen($l)>75){
          return(preg_replace("/^(.+?)\?.+$/", '\\1', substr($l,0,75)).'...');
        }else{
          return(preg_replace("/^(.+?)\?.+$/", '\\1', $l));
        }
      }
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
          $sql= 'SELECT *, url_cache.url FROM data
          inner join url_cache on url_id = url_cache.id
          WHERE timestamp>= '.$from.' AND timestamp<= '.$to.' limit 500';
        }else{
          $sql= 'SELECT *, url_cache.url FROM data
          inner join url_cache on url_id = url_cache.id
          WHERE timestamp>= '.$from.' AND timestamp<= '.$to.'
          AND IP= '.$ip.' limit 500';
        }
        $result = mysqli_query($link, $sql);
        ?>
        <tr>
            <th>IP</th>
            <th>Network Name</th>
            <th>Network speed</th>
            <th>Timestamp</th>
            <th>Audio errors</th>
            <th>Video errors</th>
            <th>URL</th>
        </tr>
        <?php
        function errors($a,$b)
        {
          if ($b==0){
            return 0;
          } else {
          return round($a/$b*100,5);
          }
        }
        function timetranslation($t)
        {
          return date('Y-m-d H:i:s',$t);
        }
        while ($row = mysqli_fetch_array($result))
        {
          echo "<tr>
            <td>".long2ip($row['IP'])."</td>
            <td>{$row['name']}</td>
            <td>{$row['speed']}</td>
            <td>".timetranslation($row['timestamp'])."</td>
            <td>".errors($row['a_frames_failed'],$row['a_frames_decoded'])."</td>
            <td>".errors($row['v_frames_failed'],$row['v_frames_decoded'])."</td>
            <td>".cutletters($row['url'])."</td>
          </tr>";
        };
      }else
      {
        $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        if (!$link)
        {
          echo 'I can not connect to the database.Error code:' . mysqli_connect_error() . '';
          exit;
        }
        $sql='SELECT IP,
                     name,
                     speed,
                     FROM_UNIXTIME(timestamp) AS time,
                     a_frames_failed/a_frames_decoded*100 AS "a",
                     v_frames_failed/v_frames_decoded*100 AS "v",
                     url_cache.url
              FROM data
              inner join url_cache on url_id = url_cache.id
              LIMIT 500';
        $result = mysqli_query($link, $sql);
    ?>
        <tr>
          <th>IP</th>
          <th>Network Name</th>
          <th>Network speed</th>
          <th>Timestamp</th>
          <th>Audio errors</th>
          <th>Video errors</th>
          <th>URL</th>
        </tr>
    <?php
        while ($row = mysqli_fetch_array($result))
        {
          echo "<tr>
            <td>".long2ip($row['IP'])."</td>
            <td>{$row['name']}</td><td>{$row['speed']}</td>
            <td>{$row['time']}</td><td>{$row['a']}</td>
            <td>{$row['v']}</td>
            <td>".cutletters($row['url'])."</td>
          </tr>";
        };
      }
    ?>
  </table>
</body>
<style>
  *{
    margin: 0;
    padding:0;
    box-sizing: border-box;
    background: #BCEBDD;
    }
    table {
    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 14px;
    border-radius: 10px;
    border-spacing: 0;
    text-align: left;
    margin:10px auto 0 auto;
    }
    th {
    background: #BCEBDD;
    color: black;
    padding: 10px 10px;
    position: sticky;
    top:0px;
    }
    th, td {
    border-style: solid;
    border-width: 1px 1px 1px 0;
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
