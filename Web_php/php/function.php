<?php

@session_start();

function get_publish_article()
{
  $datas = array();

  $sql = "SELECT * FROM `article` WHERE `publish` = 1";

  $query =mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_num_rows($query) > 0)
{
  //取得的量大於0代表有資料
  //while迴圈會根據查詢筆數，決定跑的次數
  //mysqli_fetch_assoc 方法取得 一筆值
  while ($row = mysqli_fetch_assoc($query))
  {
    $datas[] = $row;
  }
}
//釋放資料庫查詢到的記憶體
mysqli_free_result($query);
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $datas;
}
//------
function get_article($id)
{
  $result = null;

  $sql = "SELECT * FROM `article` WHERE `publish` = 1 AND `id`= {$id}";

  $query =mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_num_rows($query) == 1)
{
  //取得的量大於0代表有資料
  //while迴圈會根據查詢筆數，決定跑的次數
  //mysqli_fetch_assoc 方法取得 一筆值
  $result = mysqli_fetch_assoc($query);
  }

      //釋放資料庫查詢到的記憶體
      mysqli_free_result($query);
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;
}

function get_publish_work(){

  $datas = array();

  $sql = "SELECT * FROM `works` WHERE `publish` = 1";

  $query =mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_num_rows($query) > 0)
{
  //取得的量大於0代表有資料
  //while迴圈會根據查詢筆數，決定跑的次數
  //mysqli_fetch_assoc 方法取得 一筆值
  while ($row = mysqli_fetch_assoc($query))
  {
    $datas[] = $row;
  }
}
//釋放資料庫查詢到的記憶體
mysqli_free_result($query);
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $datas;
}
//取得作品
function get_work($id)
{
  $result = null;

  $sql = "SELECT * FROM `works` WHERE `publish` = 1 AND `id`= {$id}";

  $query =mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_num_rows($query) == 1)
{
  //取得的量大於0代表有資料
  //while迴圈會根據查詢筆數，決定跑的次數
  //mysqli_fetch_assoc 方法取得 一筆值
  $result = mysqli_fetch_assoc($query);
  }

      //釋放資料庫查詢到的記憶體
      mysqli_free_result($query);
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;
}

//-------------檢查使用者名稱是否存在或重覆

function check_username($username)
{
  $result = null;

  $sql = "SELECT * FROM `user` WHERE `username` =  '{$username}'";
  //echo $sql ;
  $query =mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_num_rows($query) == 1)
{
  //取得的量大於0代表有資料
  $result = true;
  }
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;

}

//新增使用者帳號

function add_user($username,$password,$name)
{
  $result = null;
  $password =md5($password); //加密方式
  $sql = "INSERT INTO `user` (`username`,`password`,`name`) VALUE ('{$username}','{$password}','{$name}')";
  //echo $sql ;
  $query = mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_affected_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_affected_rows($_SESSION['link']) == 1)
{
  //取得的量大於0代表有資料
  $result = true;
  }
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;

}

//檢查帳號密碼是否正確

function verify_user($username,$password)
{
  $result = null;
  $password = md5($password);
  $sql = "SELECT * FROM `user` WHERE `username` =  '{$username}' AND `password` = '{$password}'";
  //echo $sql ;
  $query =mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_num_rows($query) >= 1)
{
  //取得的量大於0代表有資料
  $user = mysqli_fetch_assoc($query);

  $_SESSION['is_login'] = true;

  $_SESSION['login_user_id'] = $user['id'];

  $result = true;
  }
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;

}

//---取得所有文章

function get_all_article()
{
  $datas = array();

  $sql = "SELECT * FROM `article`";

  $query =mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_num_rows($query) > 0)
{
  //取得的量大於0代表有資料
  //while迴圈會根據查詢筆數，決定跑的次數
  //mysqli_fetch_assoc 方法取得 一筆值
  while ($row = mysqli_fetch_assoc($query))
  {
    $datas[] = $row;
  }
}
//釋放資料庫查詢到的記憶體
mysqli_free_result($query);
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $datas;
}

//新增文章

function add_article($title,$category,$content,$publish)
{
  $result = null;

  $create_date = date("Y-m-d H:i:m");

  $creater_id = $_SESSION['login_user_id'];

  $sql = "INSERT INTO `article` (`title`,`category`,`content`,`publish`,`create_date`,`creater_id`) VALUE ('{$title}','{$category}','{$content}',{$publish},'{$create_date}',{$creater_id})";
  //echo $sql ;
  $query = mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_affected_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_affected_rows($_SESSION['link']) == 1)
{
  //取得的量大於0代表有資料
  $result = true;
  }
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;

}

//編輯文章

function get_edit_article($id)
{
  $result = null;

  $sql = "SELECT * FROM `article` WHERE `id` = {$id}";

  $query =mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_num_rows($query) == 1)
{
  //取得的量大於0代表有資料
  //while迴圈會根據查詢筆數，決定跑的次數
  //mysqli_fetch_assoc 方法取得 一筆值
  $result = mysqli_fetch_assoc($query);
  }

      //釋放資料庫查詢到的記憶體
      mysqli_free_result($query);
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;
}

//更新文章

function update_article($id,$title,$category,$content,$publish)
{
  $result = null;

  $modify_date = date("Y-m-d H:i:m");

  $sql = "UPDATE `article`
          SET
          `title` = '{$title}',`category` ='{$category}',
          `content` = '{$content}',`publish` =$publish,
          `modify_date` = '{$modify_date}' WHERE `id`=$id";
          //echo $sql ;
          $query = mysqli_query($_SESSION['link'],$sql);
if($query)
{
//執行成功
//使用 mysqli_affected_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_affected_rows($_SESSION['link']) == 1)
{
  //取得的量大於0代表有資料
  $result = true;
  }
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;

}

//刪除文章

function del_article($id)
{
  $result = null;

  $modify_date = date("Y-m-d H:i:m");

  $sql = "DELETE  FROM `article` WHERE `id` = $id";

          $query = mysqli_query($_SESSION['link'],$sql);
if($query)
{
//執行成功
//使用 mysqli_affected_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_affected_rows($_SESSION['link']) == 1)
{
  //取得的量大於0代表有資料
  $result = true;
  }
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;

}

//新增會員

function get_all_member()
{
  $datas = array();

  $sql = "SELECT * FROM `user`";

  $query =mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_num_rows($query) > 0)
{
  //取得的量大於0代表有資料
  //while迴圈會根據查詢筆數，決定跑的次數
  //mysqli_fetch_assoc 方法取得 一筆值
  while ($row = mysqli_fetch_assoc($query))
  {
    $datas[] = $row;
  }
}
//釋放資料庫查詢到的記憶體
mysqli_free_result($query);
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $datas;
}

//刪除會員

function del_member($id)
{
  $result = null;

  $sql = "DELETE  FROM `user` WHERE `id` = $id";

          $query = mysqli_query($_SESSION['link'],$sql);
if($query)
{
//執行成功
//使用 mysqli_affected_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_affected_rows($_SESSION['link']) == 1)
{
  //取得的量大於0代表有資料
  $result = true;
  }
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;

}

//編輯會員

function get_user($id)
{
  $result = null;

  $sql = "SELECT * FROM `user` WHERE `id`= {$id}";

  $query =mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_num_rows($query) == 1)
{
  //取得的量大於0代表有資料
  //while迴圈會根據查詢筆數，決定跑的次數
  //mysqli_fetch_assoc 方法取得 一筆值
  $result = mysqli_fetch_assoc($query);
  }

      //釋放資料庫查詢到的記憶體
      mysqli_free_result($query);
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;
}

//更新會員

function update_user($id,$username,$password,$name)
{
  $result = null;

  $password_sql = '';

  if($password !='')
  {
    $password =md5($password);
    $password_sql = "`password` = '{$password}',";
  }

  $sql = "UPDATE `user`
          SET
          `username` ='{$username}',{$password_sql}  `name` = '{$name}' WHERE `id`=$id";

          $query = mysqli_query($_SESSION['link'],$sql);
if($query)
{
//執行成功
//使用 mysqli_affected_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_affected_rows($_SESSION['link']) == 1)
{
  //取得的量大於0代表有資料
  $result = true;
  }
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;

}

//取得所有作品

function get_all_works()
{
  $datas = array();

  $sql = "SELECT * FROM `works`";

  $query =mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_num_rows($query) > 0)
{
  //取得的量大於0代表有資料
  //while迴圈會根據查詢筆數，決定跑的次數
  //mysqli_fetch_assoc 方法取得 一筆值
  while ($row = mysqli_fetch_assoc($query))
  {
    $datas[] = $row;
  }
}
//釋放資料庫查詢到的記憶體
mysqli_free_result($query);
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $datas;
}

//新增作品

function add_work($intro,$image_path,$video_path,$publish)
{
  $result = null;

  $upload_date = date("Y-m-d H:i:m");

  $create_user_id = $_SESSION['login_user_id'];

  $image_path_value = "'{$image_path}'";

  if($image_path == ''){
    $image_path_value = "NULL";
  }

  $video_path_value = "'{$video_path}'";

  if($video_path == ''){
    $video_path_value = "NULL";
  }

  $sql = "INSERT INTO `works`
   (`intro`,`image_path`,`video_path`,`publish`,`upload_date`,`create_user_id`)
  VALUE ('{$intro}',{$image_path_value},
         {$video_path_value},{$publish},
         '{$upload_date}','{$create_user_id}')";
  $query = mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_affected_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_affected_rows($_SESSION['link']) == 1)
{
  //取得的量大於0代表有資料
  $result = true;
  }
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;

}

//

//取得作品
function get_edit_work($id)
{
  $result = null;

  $sql = "SELECT * FROM `works` WHERE `id`= {$id}";

  $query =mysqli_query($_SESSION['link'],$sql);

if($query)
{
//執行成功
//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_num_rows($query) == 1)
{
  //取得的量大於0代表有資料
  //while迴圈會根據查詢筆數，決定跑的次數
  //mysqli_fetch_assoc 方法取得 一筆值
  $result = mysqli_fetch_assoc($query);
  }

      //釋放資料庫查詢到的記憶體
      mysqli_free_result($query);
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;
}

//更新作品

function update_work($id,$intro,$image_path,$video_path,$publish)
{
  $result = null;

  $modify_date = date("Y-m-d H:i:m");

  $work = get_edit_work($id);

  //內容處理html
  $intro = htmlspecialchars($intro);

  if(file_exists("../" . $work['image_path'])) //如果就的資料存在的話
  {
    if($image_path != $work['image_path']) //且新檔案與舊檔案不一致
    {
      unlink("../" . $work['image_path']);  //刪除舊檔案
    }
  }

  if(file_exists("../" . $work['video_path'])) //如果就的資料存在的話
  {
    if($video_path != $work['video_path']) //且新檔案與舊檔案不一致
    {
      unlink("../" . $work['video_path']);  //刪除舊檔案
    }
  }

  $image_path_sql = "`image_path` ='{$image_path}' ," ;

  if($image_path == '')
  {
    $image_path_sql = '`image_path` = NULL,';
  }
  $video_path_sql = "`video_path` ='{$video_path}' ," ;

  if($video_path == '')
  {
    $video_path_sql = '`video_path` = NULL,';
  }

  $sql = "UPDATE `works`
          SET
          `intro` = '{$intro}',{$image_path_sql}{$video_path_sql}
          `publish` =$publish,
          `modify_date` = '{$modify_date}' WHERE `id`=$id";
          //echo $sql ;
          $query = mysqli_query($_SESSION['link'],$sql);
if($query)
{
//執行成功
//使用 mysqli_affected_rows 方法，判別執行的語法，其取得的資料量，是否大於0
if (mysqli_affected_rows($_SESSION['link']) == 1)
{
  //取得的量大於0代表有資料
  $result = true;
  }
}
else
{
  //執行失敗
  echo "{$sql}語法請求失敗:<br/>" . mysqli_connect_error($_SESSION['link']);
}
return $result;
}

// 刪除作品

function del_work($id)
{
	//宣告要回傳的結果
  $result = null;

	//先取得該作品資訊，作為之後要刪除檔案用，此用本檔案中的 get_work 方法來取得作品資訊。
	$work = get_work($id);

	if($work)
	{
		//有作品才進行刪除工作
		//若有圖檔資料，以及圖檔有存在，就刪除
		if($work['image_path'] && file_exists("../".$work['image_path']))
		{
			//unlink 為刪除檔案的方法，把上一層找到 files/ 裡面的檔案，做刪除
			unlink("../".$work['image_path']);
		}

		//若有影片檔資料，以及影片檔有存在，就刪除
		if($work['video_path'] && file_exists("../".$work['video_path']))
		{
			//unlink 為刪除檔案的方法，把上一層找到 files/ 裡面的檔案，做刪除
			unlink("../".$work['video_path']);
		}

		//刪除作品語法
	  $sql = "DELETE FROM `works` WHERE `id` = {$id};";

	  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
	  $query = mysqli_query($_SESSION['link'], $sql);

	  //如果請求成功
	  if ($query)
	  {
	    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
	    if(mysqli_affected_rows($_SESSION['link']) == 1)
	    {
	      //取得的量大於0代表有資料
	      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
	      $result = true;
	    }
	  }
	  else
	  {
	    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
	  }


	}

  //回傳結果
  return $result;
}
?>
