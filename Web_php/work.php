<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once 'php/db.php';

//載入 functions.php 檔案，透過裡面的方法取得資料庫的資料
require_once 'php/function.php';

$works = get_work($_GET['p']);

$title = strip_tags($works['intro']);

$title = mb_substr($title,0,5,"utf8") . "..."

?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
		<!-- Alawys force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-A-Compatible" content="IE=edge , chrome=1">
		<title><?php echo $title;?></title>
		<meta name="description" content="Practice">
		<meta name="author" content="張家榮">
		<!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<!-- laster Compiled and minified CSS-->
		<!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		<!--Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="images/favicon.ico">

		<link rel="stylesheet" href="css/style.css?d2">
</head>

	<body>
		<!-- 頁首 -->
<?php include_once 'menu.php';?>
		<!-- 網站內容 -->
		<div class="content">
			<div class="alert alert-success" role="alert">
			 <div class="container">
				<!-- 建立第一個 row 空間，裡面準備放格線系統 -->
				<div class="row">
					<!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
					<div class="col-xs-12">
            <div class="thumbnail">
                <img src ="<?php echo $works['image_path'];?>">
                <div class="caption">
                  <h5 class="mt-0"><?php echo $works['intro'];?></h5>
            </div>
          </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include_once 'footer.php';?>
	</body>
</html>
