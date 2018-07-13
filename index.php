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
			header('Location: /clients.php');
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
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/Ff.ico">

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

<body>
  

    <div class="container">
<form action="/index.php" method="POST" class="form-signin" role="form">
	<h2 class="form-signin-heading">Пожалуйста авторизуйтесь</h2>
	<p>

 	<p><strong>Логин</strong>:</p>
 		<input type="text" name="login" class="form-control" placeholder="Логин"  value="<?php echo @$data['login']; ?>">
 	</p>

 	<p>

 	<p><strong>Пароль</strong>:</p>
 		<input type="password" name="password" class="form-control" placeholder="Пароль" value="<?php echo @$data['password']; ?>">
 	</p>
        <label class="checkbox">
          <input type="checkbox" value="remember-me">  Запомнить меня
        </label>
 	<p>
 	<button class="btn btn-lg btn-primary btn-block" name="do_login" type="submit">Войти</button>
<a href="http://mysite/password.php">Забыли пароль?</a>
</form>
</div>

</div>
  </p>


</form>


    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>