<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/Ff.ico">

    <title>Пользователи</title>

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
                <li class="active"><a href="/general.php">Пользователи</a></li>
                <li><a href="/clients.php">Клиенты</a></li>
                <li><a href="/implementer.php">Исполнители</a></li>
                <li><a href="/novzadan.php">Создать задание</a></li>
              </ul>
            </div>
          </div>


<?php
 
$data = $_POST;
if( isset($_POST['do_signup']))
{
  //здесь регистрируем

    $errors = array();
  if( trim($data['login']) == '' )
  {
       $errors[] = 'Введите логин!';
  }

  if( trim($data['email']) == '' )
  {
       $errors[] = 'Введите Email!';
  }

  if( $data['password'] == '' )
  {
       $errors[] = 'Введите пароль!';
  }

  if( $data['password_2'] != $data['password'] )
  {
       $errors[] = 'Повторный пароль введен не верно!';
  }

  if( R::count('users', "login = ?", array($data['login'])) > 0)
  {
       $errors[] = 'Пользователь с таким логином уже существует!';
  }

  if( R::count('users', "email = ?", array($data['email'])) > 0)
  {
       $errors[] = 'Пользователь с таким email уже существует!';
  }

  if( empty($errors))
  {
    //все хорошо, регестрируем
    $user = R::dispense('users');
    $user->login = $data['login'];
    $user->email = $data['email'];
    $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
    R::store($user);
    echo '<div style="color: green;">Вы успешно зарегистрировались</div><hr>';
  } else
  {
    echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
  }
}
 ?>
<div class="control-group">

 <form class="form-horizontal" action="/general.php" method="POST">
  
  <p>

  <p><strong>Ваш логин</strong>:</p>
    <input type="text"  name="login" placeholder="Введите логин" value="<?php echo @$data['login']; ?>">
  </p>

  <p><strong>Ваш Email</strong>:</p>
    <input type="email" name="email" placeholder="Введите email" value="<?php echo @$data['email']; ?>">
  </p>

  <p><strong>Ваш пароль</strong>:</p>
    <input type="password" name="password" placeholder="Введите пароль" value="<?php echo @$data['password']; ?>">
  </p>

  <p><strong>Ваш пароль повторно</strong>:</p>
    <input type="password" name="password_2" placeholder="Введите пароль повторно" value="<?php echo @$data['password_2']; ?>">
  </p>

  <p>
  <button type="submit" name="do_signup" class="btn btn-lg btn-default">Зарегистрировать</button>
  </p>
 </form>
 </div>

           <div class="table-responsive">
           <table class="table table-hover">
           <tr><th>ID Пользователя</th><th>Логин</th><th>Email</th><th>Пароль</th></tr>

             <?php
             
             foreach($result = R::getAll('SELECT * FROM users') as $row) {
             echo '<tr><th>'.' '.$row['id'].'</th><th>'.$row['login'].'</th><th>'.$row['email'].'</th><th>'.$row['password'].'<br>'; 
            }
            ?>
           </table>
          </div>


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

