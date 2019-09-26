<?php

require_once 'db.php';

require_once 'function.php' ;

$check = update_user($_POST['id'],$_POST['user'],$_POST['pw'],$_POST['name']);

if($check)
{
  //代表帳號有存在
  echo 'T' ;
}
else
{
  //代表帳號並無存在
  echo 'F';
}

?>
