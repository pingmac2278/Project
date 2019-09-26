<?php

//上傳檔案資訊，需透過 $_FILES 取得 是一個二維陣列
//print_r($_FILES);
//print_r($_POST);
//echo $_FILES['file']['name']; //第一個陣列索引值 是表單給予的 name="image_path" 來源 第二個索引值為上船的檔案名稱
//echo $_FILES['file']['type']; //檔案型態
//echo $_FILES['file']['typename']; //上傳後暫存 在server 的位置與檔名
//echo $_FILES['file']['error']; //錯誤碼為0 = 上傳正常 錯誤碼為4 = 沒選擇檔案
//echo $_FILES['file']['size']; //檔案大小 byte為單位

//處理上傳檔案  圖片
// file_exists 方法來判別檔案是否存在server上

      if(file_exists($_FILES['file']['tmp_name']))
      {
        //先定義上傳的資料夾
        $img_folder = $_POST['save_path'];

       //取得原檔案名稱
        $file_name = $_FILES['file']['name'];

      //如果存在就搬移檔案 move_upload_file 方法 將上傳的檔案移動到資料夾指定的位置上
      //第一個變數 = 上傳後暫存的檔案位置  第二個變數 = 搬移目標檔案與位置
      //$img_folder , $img_name = files/images/檔案.jpg
      // work_save.php 這隻檔案在 php 資料夾中，但圖檔是要上傳到「上一層裡找到 files資料夾」，所以搬移的上傳位置要加上 ../

      if(move_uploaded_file($_FILES['file']['tmp_name'], "../" . $img_folder . $file_name)){
        echo "T";
      }
      else{
        echo "檔案搬移失敗，請確認{$_POST['save_path']}資料夾可寫入";
      }
      }
      else{
        echo "上傳失敗，暫存檔不存在！！";
      }
?>
