<?php

$file_path = $_SERVER['PHP_SELF'];

$file_name = basename($file_path,".php");

switch ($file_name) {
  case 'article':
    $page_index = 1 ;
    break;
  case 'article_list':
    $page_index = 1 ;
    break;
  case 'work_list':
    $page_index = 2 ;
    break;
  case 'work':
    $page_index = 2 ;
    break;
  case 'about':
    $page_index = 3 ;
    break;
  case 'login':
    $page_index = 4 ;
    break;
  case 'register':
    $page_index = 5 ;
    break;
  default:
    $page_index = 0;
    break;
}

?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
    <div class="row">
  <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
      <div class="col-xs-12">
  <!--網站標題-->
       <h1>Personal website</h1>
  <!-- 選單 -->
        <nav>
         <ul class="nav nav-pills mb-3">
           <li <?php echo ($page_index == 0)?"class='active'":"0";?>>
             <a  href="index.php">首頁</a>
           </li>
           <li <?php echo ($page_index == 1)?"class='active'":"0";?>>
             <a  href="article_list.php">所有文章</a>
           </li>
           <li <?php echo ($page_index == 2)?"class='active'":"0";?>>
             <a  href="work_list.php">所有作品</a>
           </li>
           <li <?php echo ($page_index == 3)?"class='active'":"0";?>>
             <a  href="about.php">關於</a>
           </li>
           <li class="login" <?php echo ($page_index == 4)?"class='active'":"0";?>>
             <a  href="admin/index.php">登入</a>
           </li>
           <li class="login" <?php echo ($page_index == 5)?"class='active'":"0";?>>
             <a  href="register.php">註冊</a>
           </li>
         </ul>
         <nav>
      </div>
    </div>
  </div>
</div>
