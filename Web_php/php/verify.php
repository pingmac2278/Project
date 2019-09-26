<?php

require_once 'db.php';
require_once 'function.php';

$check = verify_user($_POST['user'],$_POST['pw']);

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
