<?php

require_once 'db.php';

require_once 'function.php';

$check = del_work($_POST['id']);

if($check)
{
  echo 'T';
}
else
{
  echo 'F';
}

?>
