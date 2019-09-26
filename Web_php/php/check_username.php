<?php

require_once 'db.php';
require_once 'function.php';

$check = check_username($_POST['n']);

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
