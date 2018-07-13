<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/Ff.jpg">

    <title>For You</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

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


$data = $_POST;

if( isset($data['do_login']))
{
  $errors = array();
  $user = R::findOne('users', 'login = ?', array($data['login']));
  if( $user )
  {
       //логин существует
    if( password_verify($data['password'], $user->password))
    {
          //все хорошо, логиним пользователя
      $_SESSION['logged_user'] = $user;
      header('Location: /mysite');
      echo '<div style="color: green;">Вы авторизованы!</div>Можете перейти на <a href="/mysite">главную</a> страницу</div><hr>';
    } else
    {
      $errors[] = 'Неверно введен пароль!';
    }
  } else
  {
    $errors[] = 'Пользователь с таким логином не найден!';
  }

  if( ! empty($errors))
  
  {
    echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
  }
}


?>

  <body>
  

    <div class="container">

      <form  action="/mysite/newlogin.php" method="POST" class="form-signin" role="form">
        <h2 class="form-signin-heading">Пожалуйста авторизуйтесь</h2>
        <input type="email" class="form-control" placeholder="Логин"  value="<?php echo @$data['login']; ?>" required autofocus >
        <input type="password" class="form-control" placeholder="Пароль" value="<?php echo @$data['password']; ?>" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me">  Запомнить меня
        </label>
        <button class="btn btn-lg btn-primary btn-block" name="do_login" type="submit">Войти</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>