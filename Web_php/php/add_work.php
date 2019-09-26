<?php

require_once 'db.php';

require_once 'function.php';

$check = add_work($_POST['intro'],$_POST['image_path'],$_POST['video_path'],$_POST['publish']);


if($check)
{
  echo 'T';
}
else
{
  echo 'F';

}
?>
