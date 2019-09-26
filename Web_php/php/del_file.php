<?php

if(file_exists("../" . $_POST['file'])){
  //如果檔案存在就刪除
  if(unlink("../" . $_POST['file'])){
    echo "T";
  }
  else {
    echo "F";
  }
}
else {
    echo "檔案不存在";
}

?>
