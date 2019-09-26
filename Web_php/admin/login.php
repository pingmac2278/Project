<?php

require_once '../php/db.php';

require_once '../php/function.php' ;

$datas = get_publish_article();

if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
  header ("Location:index.php");
}


?>

<!DOCTYPE html>
<html lang="zh-TW">
  <head>
      <!-- Alawys force latest IE rendering engine (even in intranet) & Chrome Frame
      Remove this if you use the .htaccess -->
      <meta http-equiv="X-A-Compatible" content="IE=edge , chrome=1">
      <title>會員登入</title>
      <meta name="description" content="Practice">
      <meta name="author" content="張家榮">
      <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
      <meta name="viewport" content="width=device-width, initial-scale=1" >
      <!-- laster Compiled and minified CSS-->
      <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
      <!--Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
      <link rel="shortcut icon" href="images/favicon.ico?w">

      <link rel="stylesheet" href="css/style.css?sS">
  </head>
 <body>
     <div class="content">
       <div class="alert alert-success" role="alert">
          <div class="container">
            <div class="row">
              <div class="col-xs-8 col-sm-6 col-sm-offset-3">
                <div>
                  <h1>會員登入</h1>
                </div>
                <form action="php/add_number.php" id="login_form" method="post">
                  <div class="form-group">
                    <label for="username" class="col-sm-4 control-label">Account number</label>
                    <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your account number" required>
                    <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password " required>
                  </div>
                 <div class="col-xs-12 text-center">
                  <button type="submit" class="btn btn-primary">Sign in</button>
                  <a  class= "btn btn-primary" href="../">Back</a>                  
                </div>
                </form>
             </div>
           </div>
         </div>
       </div>
     </div>
     <?php include_once 'footer.php';?>
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
     <script>
      /**
      * 當帳號輸入後,檢查帳號是否重覆
      */
       $(document).on("ready", function() {
        //當文件準備好時
        //當表單 sumbit 出去的時候
 				$("#login_form").on("submit", function(){

            $.ajax({
                type : "POST" , //表單傳送方式 同form 的 method 屬性
                url  : "../php/verify.php" , //目的給哪個檔案 同form 的 action 屬性
                data : { // 為要傳過去的資料以物件方式呈現 因變數key值為英文的關係 , 所以用物件方式傳送  ex: {name : "輸入的id , password : "輸入的密碼"}
                'user'   : $("#username").val(),
                'pw'   : $("#password").val()
              },
                dataType : 'html' //f設定網頁回應的檔案格式 html 格式
            }).done(function(data) {
                 if(data == "T"){
                  window.location.href="index.php";
                 }
                 else{
                  alert("登入失敗!! ，請確認帳號密碼是否正確~~");
                 }

            }).fail(function(jqXHR,textStatus,errorThrown){
               //失敗的時候
               alert ("有錯誤產生，請查看console log");
               console.log(jqXHR,textStatus,errorThrown);
             });
          return false;
 				});
       });
     </script>
      </body>
  </html>
