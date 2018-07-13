     <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">  
  <title>Remove </title>
</head>
<body>

<?php
require_once 'connection.php';
 // $db = mysqli_connect('127.0.0.1', 'root', '', 'mybd')
  //  or die('Error connecting to MySQL server.');
if(isset($_POST['id'])){
//  $id = $_POST['id'];

 // $query = "DELETE FROM implementer WHERE id = '$id' ";
//  mysqli_query($db, $query)
  $link = mysqli_connect('localhost', 'root','' , 'mybd') 
            or die("Ошибка " . mysqli_error($link)); 
    $id = mysqli_real_escape_string($link, $_GET['id']);
     
    $query ="DELETE FROM implementer WHERE id = '$id'";
 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    mysqli_close($link);
     
  }
   // or die('Error querying database.');

  //echo 'Customer removed: ' . $id.';

 // mysqli_close($db);
  
  //echo $_POST['id'];
 // require('implementer.php');
 if(isset($_GET['id']))
{   
    $id = htmlentities($_GET['id']);
    echo "<h2>Вы действительно хотите удалить?</h2>
        <form method='POST'>
        <input type='hidden' name='id' value='$id' />
        <input type='submit' value='Удалить'>
        </form>";

}
?>
  <meta http-equiv="refresh" content="2; url=http://mysite/implementer.php">

</body>
</html>