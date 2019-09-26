<!DOCTYPE html>
<html lang="zh-TW">
<head>
		<!-- Alawys force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-A-Compatible" content="IE=edge , chrome=1">
		<title>關於</title>
		<meta name="description" content="Practice">
		<meta name="author" content="張家榮">
		<!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<!-- laster Compiled and minified CSS-->
		<!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		<!--Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="images/favicon.ico">

		<link rel="stylesheet" href="css/style.css?d">
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
            <div class="row">
              <div class="col-md-6">
                <h1>Curriculum Vitae </h1>
                <p> 中文姓名：張家榮
                    <br>
                    性別：男
                    <br>
                    兵役狀況：役畢
                    <br>
                    退伍時間：2018年02月
                    <br>
                    出生日期：1995年04月28日
                    <br>
                    婚姻狀況：暫不提供
                    <br>
                    身高體重：暫不提供
                    <br>
                    最高學歷：元培醫事科技大學(台灣)
                    資訊工程系(資訊工程相關)大學
                    <br>
                    (2013／09～2018／06)畢業
                </p>
              </div>
              <div class="col-md-6">
                <h1>Contact</h1>
                <p>
                  地址：新北市蘆洲區長安街
                  <br>
                  電話：09-87313355
                  <br>
                  信箱：<a href="mailto:andymax0428@gmail.com ">andymax0428@gmail.com </a>
                  <br>
                  <h1>Work Experience</h1>
                  職務累計年資：
                  <br>
                  職務1：全職／網路管理工程師  年資：1年(含)以下
                  <br>
                  職務2：兼職／餐飲服務生  年資：1年(含)以下
                  <br>
                  職務3：兼職／壓鑄模具技術人員  年資：1年(含)以下
                  <br>
                  職務4：兼職／門市／店員／專櫃人員  年資：1年(含)以下
                  <br>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once 'footer.php';?>
		</div>
	</body>
</html>
