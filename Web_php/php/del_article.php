<?php

require_once 'db.php';

require_once 'function.php';

$check = del_article($_POST['id']);

if($check)
{
  echo 'T';
}
else
{
  echo 'F';
}

?>
