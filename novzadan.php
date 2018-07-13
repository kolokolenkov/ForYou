<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/Ff.ico">

    <title>Создать задание</title>

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

  <?php
 
 require "db.php";
 ?>

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
                <li><a href="/implementer.php">Исполнители</a></li>
                <li class="active"><a href="/novzadan.php">Создать задание</a></li>
              </ul>
            </div>
          </div>
          <script language="JavaScript"> 
function fclear(idf) {
idf.value=""; 
}
</script> 
      
<?php
 
$data = $_POST;
if( isset($_POST['do_sign']))
{
  //здесь регистрируем

    $errors = array();
  

  if( trim($data['nazvanie']) == '' )
  {
       $errors[] = 'Введите Название!';
      ($data['nazvanie']);
  }

  if( $data['data'] == '' )
  {
       $errors[] = 'Введите дату!';
  }
  

  if( ($data['tel']) == '' )
  {
       $errors[] = 'Введите Телефон!';
  }

  

  if( empty($errors))
  {

    if( isset($_POST['id']) && isset($_POST['nazvanie']) &&  isset($_POST['tel'])) {

  $link = mysqli_connect('localhost', 'root','' , 'mybd') 
            or die("Ошибка " . mysqli_error($link)); 
   $id = mysqli_real_escape_string($link, $_POST['id']);
     $nazvanie = mysqli_real_escape_string($link, $_POST['nazvanie']);
     $data = mysqli_real_escape_string($link, $_POST['data']);
     
     $tel = mysqli_real_escape_string($link, $_POST['tel']);
    $query ="INSERT INTO zadaniya VALUES ('$id','$nazvanie','$data','$tel')";
  
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
     
    $query ="DELETE FROM zadaniya WHERE id = '$id'";
 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    mysqli_close($link);
     
  }

if (isset($_GET['button']))
{
      $res = R::query('SELECT id FROM zadaniya');
  
 
while ($row=R::fetch($res))
        {
       $z="button".$row['id'];
       if ($_GET[$z]!=' ')
        {
              $user->query("DELETE FROM zadaniya WHERE id=".$row['id']);
        }
         
 
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
  <p><strong>Раздел задания</strong>:
    <input type="text" name="nazvanie" placeholder="Введите Раздел Задания" onClick="fclear(this) value="<?php echo @$data['nazvanie']; ?>">
  </p>
  </div>
<div class="form-group">
  <strong>Дата</strong>:
    <input type="text" name="data" placeholder="Введите дату" onClick="fclear(this) value="<?php echo @$data['data']; ?>">
  </div>

<div class="form-group">
  <p><strong>Номер телефона клиента</strong>:
    <input type="text" name="tel" placeholder="Введите номер телефона" onClick="fclear(this) value="<?php echo @$data['tel']; ?>">
  </p>
  </div>
<div class="form-group">
  <p>
  <button  type="submit" name="do_sign" class="btn  btn-primary">Добавить</button>
  </p>
  </div>
  
 </form>




          <div class="table-responsive">
           <table class="table table-hover">
            <form method="post"  >

           <tr><th>ID Задания</th><th>Имя названия</th><th>Дата</th><th>Телефон клиента</th><th></th></tr>

             <?php
             foreach($result = R::getAll('SELECT * FROM zadaniya ORDER BY BINARY(lower(nazvanie))' ) as $row) {
             echo '<tr><th>'.' '.$row['id'].'</th><th>'.$row['nazvanie'].'</th><th>'.$row['data'].'</th><th>'.$row['tel'].'</th><th>'. '<p> ';

    
  
        
          
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