<?php

require_once 'db.php';

require_once 'function.php';

$check = add_article($_POST['title'],$_POST['category'],$_POST['content'],$_POST['publish']);

if($check)
{
  echo 'T';
}
else
{
  echo 'F';
}

?>
