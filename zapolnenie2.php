<?php
require "db.php";

?>
<?php
 
$data = $_POST;
if( isset($_POST['do_sign']))
{
  //здесь регистрируем

    $errors = array();
  

 if( ($data['id']) == '' )
  {
       $errors[] = 'Введите id!';
       ($data['id']);
  }
  if( trim($data['nazvanie']) == '' )
  {
       $errors[] = 'Введите Название!';
      ($data['nazvanie']);
  }

  if( $data['data'] == '' )
  {
       $errors[] = 'Введите дату!';
  }
  if( trim($data['comment']) == '' )
  {
       $errors[] = 'Введите Комментарий!';
  }
  if( trim($data['textZadaniya']) == '' )
  {
       $errors[] = 'Введите Текст задания!';
  }

  if( ($data['tel']) == '' )
  {
       $errors[] = 'Введите Телефон!';
  }

  

  if( empty($errors))
  {

    //все хорошо, регестрируем
    $user = R::dispense('zadaniya');
    $user->id = $data['id'];
    $user->nazvanie = $data['nazvanie'];
    $user->data = $data['data'];
    $user->comment = $data['comment'];
    $user->textZadaniya = $data['textZadaniya'];
    $user->tel = $data['tel'];
    
    R::store($user);
    echo '<div style="color: green;">Вы успешно добавили задание</div><hr>';
  } else
  {
    echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
  }
}
 ?>

 <form class="form-horizontali" action="/zapolnenie2.php" method="POST">
  
  

  <p><strong>id</strong>:</p>
    <input type="text" name="id" placeholder="Введите id" value="<?php echo @$data['id']; ?>">
  </p>

  <p><strong>Раздел задания</strong>:</p>
    <input type="text" name="nazvanie" placeholder="Введите Раздел Задания" value="<?php echo @$data['nazvanie']; ?>">
  </p>

  <p><strong>Дата</strong>:</p>
    <input type="text" name="data" placeholder="Введите дату" value="<?php echo @$data['data']; ?>">
  </p>

   <p><strong>Отзывы исполнителей</strong>:</p>
    <input type="text" name="comment" placeholder="Введите комментарий" value="<?php echo @$data['comment']; ?>">
  </p>

  <p><strong>Текст задания</strong>:</p>
    <input type="text" name="textZadaniya" placeholder="Введите Текст Задания" value="<?php echo @$data['textZadaniya']; ?>">
  </p>

<p><strong>Номер телефона клиента</strong>:</p>
    <input type="text" name="tel" placeholder="Введите телефон" value="<?php echo @$data['tel']; ?>">
  </p>

  <p>
  <button type="submit" name="do_sign" class="btn btn-lg btn-default">Добавить</button>
  </p>
 </form>
