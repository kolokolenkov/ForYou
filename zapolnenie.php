<?php 
require "db.php";

?>
<?php
 
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
    echo '<div style="color: green;">Вы успешно зарегистрировались</div><hr>';
  } else
  {
    echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
  }
}
 ?>

 <form class="form-horizontal" action="/zapolnenie.php" method="POST">
  
  

  <p><strong>ФИО</strong>:</p>
    <input type="text" name="fio" placeholder="Введите ФИО" value="<?php echo @$data['fio']; ?>">
  </p>

  <p><strong>Специальность</strong>:</p>
    <input type="text" name="special" placeholder="Введите специальность" value="<?php echo @$data['special']; ?>">
  </p>

  <p><strong>Номер телефона</strong>:</p>
    <input type="text" name="telephone" placeholder="Введите номер телефона" value="<?php echo @$data['telephone']; ?>">
  </p>

   <p><strong>Количество выполненных заказов</strong>:</p>
    <input type="text" name="kolzak" placeholder="Введите количество выполненных заказов" value="<?php echo @$data['kolzak']; ?>">
  </p>

  <p><strong>Рейтинг</strong>:</p>
    <input type="text" name="reiting" placeholder="Введите рейтинг" value="<?php echo @$data['reiting']; ?>">
  </p>

  <p>
  <button type="submit" name="do_signup" class="btn btn-lg btn-default">Добавить</button>
  </p>
 </form>
