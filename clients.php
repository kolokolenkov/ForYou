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

    <title>Главная</title>

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
                <li class="active"><a href="/clients.php">Клиенты</a></li>
                <li><a href="/implementer.php">Исполнители</a></li>
                <li><a href="/novzadan.php">Создать задание</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Cover your page.</h1>
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
              <a href="#" class="btn btn-lg btn-default">Добавить</a>
            </p>
          </div>

          <div class="table-responsive">
           <table class="table table-hover">
           <tr><th>ID Исполнителя</th><th>ФИО</th><th>Специализация</th><th>Номер телефона</th><th>Количество выполненных заказов</th><th>Рейтинг</th></tr>

             <?php
             
             foreach($result = R::getAll('SELECT * FROM Исполнители') as $row) {
             echo '<tr><th>'.' '.$row['ID_Исполнителя'].'</th><th>'.$row['ФИО'].'</th><th>'.$row['Специализация'].'</th><th>'.$row['Номер_телефона'].'</th><th>'.$row['Количество_выполненных_заказов'].'</th><th>'.$row['Рейтинг'].'<br>'; 
            }
            ?>
           </table>
          </div>



          <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href=""></a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    




 


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
  </body>
</html>