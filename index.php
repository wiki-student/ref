<html>
<head>
 <title>bd</title>
</head>
<body>
 <form method="POST" action="">
  <input name="id" type="number"/>
  <input name="name" type="text"/>
  <input type="submit" value="send"/>
 </form>
</body>
</html>
<?php 
    $id = $_POST['id'];
    $name = $_POST['name'];
    $db_host = "localhost"; 
    $db_base = 'test'; 
    $db_table = "mytable";
    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_base");
        $db->exec("set names utf8");
    } catch (PDOException $e) {
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }

    $data = array( 'id' => $id, 'name' => $name );
    $query = $db->prepare("INSERT INTO $db_table (id, name) values (:id, :name)");
    $query->execute($data);
?>