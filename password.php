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
<form method="POST">

    <center> 
      <tr>
        <meta charset="utf-8">
      <td>Логин:</td>
      <td><input type="text" size="20" name="login"></td>
      </tr>
      <p> </p>
      <p>
      <tr>
      <td>E-mail:</td>
      <td><input type="text" size="20" name="email"></td>
      </tr>
  </p>
  <p>
      <tr>
       <td></td>
      <td colspan="2">
<input type="submit" value="Восстановить пароль" name="submit"></td>
      </tr>
  </p>
     <br>
     </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
      </form>
      </center>
</table>
<?php
require "db.php";
$link = mysqli_connect('localhost', 'root','' , 'mybd') 
            or die("Ошибка " . mysqli_error($link)); 
$email = mysqli_real_escape_string($link, $_POST['email']);
     $login = mysqli_real_escape_string($link, $_POST['login']);
     $password = mysqli_real_escape_string($link, $_POST['password']);
if (isset($_POST['submit'])){     
    $login = $_POST['login'];
    $email = $_POST['email'];
                
    if (empty($login)){
        echo "Введите логин!"; 
    }
    elseif (empty($email)){
        echo "Введите e-mail!";
    }
   else{
 $query = "SELECT login, email, password FROM `users` WHERE login = '$login' AND email = '$email' LIMIT 1" ;
       // UNION ALL
       // SELECT login, email, password FROM `sense` WHERE email ='{$email}' LIMIT 1";

       
        $resultat = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

       while($array = mysqli_fetch_array($resultat))
 {

}
        

        if (mysqli_num_rows($resultat) > 0){
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max=10; 
        $size=StrLen($chars)-1; 
        $password=null; 
                                               
        while($max--) {
              $password.=$chars[rand(0,$size)]; 
        }
        $newmdPassword = password_hash($password,PASSWORD_DEFAULT); 
        $title = 'Vosstanovlenie parolya '.$login.' dlya ForYou.ru!';
        $letter = 'Vi zaprosili vosstanovlenie accaunta '.$login.' dlya ForYou.ru! Vash novyi parol: '.$password.'
         S Uvageniem ForYou!';
// Отправляем письмо
        if (mail($email, $title, $letter, "Content-type:text/plain; Charset=windows-1251\r\n")) {
             $query="UPDATE users SET password = '$newmdPassword' WHERE login = '$login'  AND email = '$email'";
             $link = mysqli_connect('localhost', 'root','' , 'mybd') 
            or die("Ошибка " . mysqli_error($link));
             $res = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        echo 'Новый пароль отправлен на ваш e-mail!<br><a href="index.php">Главная страница</a>';
      }  else { 
    echo "some error happen"; 
         }
      }                              
   }
}
mysqli_close($link);
?>