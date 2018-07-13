<!DOCTYPE html>
<html lang="en">
<?php 
require "db.php";

?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/Ff.ico">

    <title>Исполнители</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

   <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">For You</h3>
              <ul class="nav masthead-nav">
                <li ><a href="/general.php">Пользователи</a></li>
                <li><a href="/clients.php">Клиенты</a></li>
                <li class="active"><a href="/implementer.php">Исполнители</a></li>
                <li><a href="/novzadan.php">Создать задание</a></li>
              </ul>
            </div>
          </div>
          <!--
          <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>-->

<script language="JavaScript"> 
function fclear(idf) {
idf.value=""; 
} 
</script> 

<?php
$data = $_POST;
if( isset($_POST['transform']))
{
  

    $errors = array();
  
if( trim($data['id']) == '' )
  {
       $errors[] = 'Введите id!';
       var_dump($data['id']);
  }

  if( trim($data['fio']) == '' )
  {
       $errors[] = 'Введите ФИО!';
       var_dump($data['fio']);
  }

  if( $data['special'] == '' )
  {
       $errors[] = 'Введите специальность!';
  }
  if( trim($data['telephone']) == '' )
  {
       $errors[] = 'Введите номер телефона!';
  }

  if( trim($data['kolzak']) == '' )
  {
       $errors[] = 'Введите количество выполненных заказов!';
  }

  if( $data['reiting'] == '' )
  {
       $errors[] = 'Введите рейтинг!';
  }
  if( empty($errors))
  {

  if(isset($_POST['transform']) && isset($_POST['fio']) && isset($_POST['special']) && isset($_POST['telephone']) && isset($_POST['kolzak']) && isset($_POST['reiting']) && isset($_POST['id'])) {

  $link = mysqli_connect('localhost', 'root','' , 'mybd') 
            or die("Ошибка " . mysqli_error($link)); 
   $id = mysqli_real_escape_string($link, $_POST['id']);
     $fio = mysqli_real_escape_string($link, $_POST['fio']);
     $special = mysqli_real_escape_string($link, $_POST['special']);
     $telephone = mysqli_real_escape_string($link, $_POST['telephone']);
     $kolzak = mysqli_real_escape_string($link, $_POST['kolzak']);
     $reiting = mysqli_real_escape_string($link, $_POST['reiting']);
    $query ="UPDATE implementer SET fio = '$fio', telephone= '$telephone',special='$special',kolzak='$kolzak',reiting='$reiting' WHERE id = '$id'";
  
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    mysqli_close($link);
     
  }
}
  else
  {
    echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
  }
    
}
if(isset($_POST['del'])){

  $link = mysqli_connect('localhost', 'root','' , 'mybd') 
            or die("Ошибка " . mysqli_error($link)); 
    $id = mysqli_real_escape_string($link, $_POST['del']);
     
    $query ="DELETE FROM implementer WHERE id = '$id'";
 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    mysqli_close($link);
     
  }

if (isset($_GET['button']))
{
      $res = R::query('SELECT id FROM implementer');
  
 
while ($row=R::fetch($res))
        {
       $z="button".$row['id'];
       if ($_GET[$z]!=' ')
        {
              $user->query("DELETE FROM implementer WHERE id=".$row['id']);
        }
         
 
        }
}
 
$data = $_POST;
if( isset($_POST['do_signup']))
{
  //здесь регистрируем

    $errors = array();
  

  if( trim($data['fio']) == '' )
  {
       $errors[] = 'Введите ФИО!';
       var_dump($data['fio']);
  }

  if( $data['special'] == '' )
  {
       $errors[] = 'Введите специальность!';
  }
  if( trim($data['telephone']) == '' )
  {
       $errors[] = 'Введите номер телефона!';
  }

  if( trim($data['kolzak']) == '' )
  {
       $errors[] = 'Введите количество выполненных заказов!';
  }

  if( $data['reiting'] == '' )
  {
       $errors[] = 'Введите рейтинг!';
  }

  

  if( empty($errors))
  {

    //все хорошо, регестрируем
    $user = R::dispense('implementer');
    
    $user->fio = $data['fio'];
    $user->special = $data['special'];
    $user->telephone = $data['telephone'];
    $user->kolzak = $data['kolzak'];
    $user->reiting= $data['reiting'];
    
    R::store($user);
    header("Location: implementer.php");
    echo '<div style="color: green;">Вы успешно зарегистрировались</div><hr>';
  } else
  {
    echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
  }
}
 ?>

 <form class="form-horizontal"  method="POST">
  
  <div class="form-group">
  <strong>Id</strong>:
  <?php $id = $row['id']?>
    <input type="text" name="id" placeholder="Введите id" onClick="fclear(this) value="<?php echo @$data['id']; ?>">
  </div>
<div class="form-group">
  <p><strong>ФИО</strong>:
    <input type="text" name="fio" placeholder="Введите ФИО" onClick="fclear(this) value="<?php echo @$data['fio']; ?>">
  </p>
  </div>
<div class="form-group">
  <strong>Специальность</strong>:
    <input type="text" name="special" placeholder="Введите специальность" onClick="fclear(this) value="<?php echo @$data['special']; ?>">
  </div>
<div class="form-group">
  <p><strong>Номер телефона</strong>:
    <input type="text" name="telephone" placeholder="Введите номер телефона" onClick="fclear(this) value="<?php echo @$data['telephone']; ?>">
  </p>
  </div>
<div class="form-group">
   <p><strong>Количество выполненных заказов</strong>:
    <input type="text" name="kolzak" placeholder="Введите количество выполненных заказов" onClick="fclear(this) value="<?php echo @$data['kolzak']; ?>">
  </p>
  </div>
<div class="form-group">
  <p><strong>Рейтинг</strong>:
    <input type="text" name="reiting" placeholder="Введите рейтинг" onClick="fclear(this) value="<?php echo @$data['reiting']; ?>">
  </p>
  </div>
<div class="form-group">
  <p>
  <button  type="submit" name="do_signup" class="btn btn-lg btn-primary">Добавить</button>
  </p>
  </div>
  <div >
   <?php $reiting = $row['reiting']?>
  <p>
<?php foreach($result = R::getAll('SELECT * FROM implementer') as $row) 
       $id = $row['id'];
 $fio = $row['fio']?>      
  <button  type="submit" name="transform" class="btn btn-lg btn-primary" value="<?php echo $fio ?>" >Изменить</button>
  </p>
  </div>

  <div class="form-group">
  <p>
  <button  type="submit" name="do_delete" class="btn btn-lg btn-primary">Удалить</button>
  </p>
  </div>
 </form>




          <div class="table-responsive">
           <table class="table table-hover">
            <form method="post"  >

           <tr><th>ID Исполнителя</th><th>ФИО</th><th>Специализация</th><th>Номер телефона</th><th>Количество выполненных заказов</th><th>Рейтинг</th><th></th></tr>

             <?php
             foreach($result = R::getAll('SELECT * FROM implementer ORDER BY BINARY(lower(special))' ) as $row) {
             echo '<tr><th>'.' '.$row['id'].'</th><th>'.$row['fio'].'</th><th>'.$row['special'].'</th><th>'.$row['telephone'].'</th><th>'.$row['kolzak'].'</th><th>'.$row['reiting'].'</th><th>'. '<p> ';

    
  
        
          
    $id = $row['id']?>
      <button  type="submit" name="del" class="btn btn-lg btn-primary" value="<?php echo $id; ?>" >Удалить</button>
  <?php     
}
?>
</form>
  </p>'.'<br>';  

            
    
  
           </table>
          </div>     
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href=""></a>.</p>
            </div>
          

        </div>

      </div>

    </div>

  

</body>
</html>
<html>
<head>
  <br>
<div class="table-responsive">
<table class="table table-striped">
</table>
</div>

<hr>
<a href="logout.php">Выйти</a>
  <meta charset=utf-8" />
  <title>Remove Email</title>
</head>
</html>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
  </body>
</html>
