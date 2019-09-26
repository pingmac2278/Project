<?php

$file_path = $_SERVER['PHP_SELF'];

$file_name = basename($file_path,".php");

switch ($file_name) {
  case 'article_list':
  case 'article_edit':
  case 'article_add':
    $page_index = 1 ;
    break;
  case 'work_list':
  case 'work_edit':
  case 'work_add':
    $page_index = 2 ;
    break;
  case 'member_list':
  case 'member_edit':
  case 'member_add':
    $page_index = 3 ;
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
         <ul class="nav nav-pills mb-3">
           <li <?php echo ($page_index == 0)?"class='active'":"0";?>>
             <a  href="index.php">後台首頁</a>
           </li>
           <li <?php echo ($page_index == 1)?"class='active'":"0";?>>
             <a  href="article_list.php">所有文章</a>
           </li>
           <li <?php echo ($page_index == 2)?"class='active'":"0";?>>
             <a  href="work_list.php">所有作品</a>
           </li>
           <li <?php echo ($page_index == 3)?"class='active'":"0";?>>
             <a  href="member_list.php">所有會員</a>
           </li>
           <li>
             <a  href="../php/logout.php">登出</a>
           </li>
         </ul>
      </div>
    </div>
  </div>
</div>
