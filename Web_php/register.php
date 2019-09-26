<?php

require_once 'php/db.php';

require_once 'php/function.php' ;

$datas = get_publish_article();



?>

<!DOCTYPE html>
<html lang="zh-TW">
  <head>
      <!-- Alawys force latest IE rendering engine (even in intranet) & Chrome Frame
      Remove this if you use the .htaccess -->
      <meta http-equiv="X-A-Compatible" content="IE=edge , chrome=1">
      <title>會員註冊</title>
      <meta name="description" content="Practice">
      <meta name="author" content="張家榮">
      <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
      <meta name="viewport" content="width=device-width, initial-scale=1" >
      <!-- laster Compiled and minified CSS-->
      <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
      <!--Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
      <link rel="shortcut icon" href="images/favicon.ico">

      <link rel="stylesheet" href="css/style.css?S">
  </head>
 <body>
<?php include_once 'menu.php';?>
     <div class="content">
       <div class="alert alert-success" role="alert">
          <div class="container">
            <div class="row">
              <div class="col-xs-8 col-sm-6 col-sm-offset-3">
                <form action="php/add_number.php" id="register_form" method="post">
                  <div class="form-group">
                    <label for="username" class="col-sm-4 control-label">Account number</label>
                    <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your account number" required>
                    <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password " required>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Check password</label>
                    <input type="password" class="form-control"  id="confirm_password" placeholder="Enter your password again" required>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your ID" required>
                  </div>
                 <div class="col-xs-12 text-center">
                  <button type="submit" class="btn btn-primary">submit</button>
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
      $("#username").on("keyup",function(){
        if($(this).val() !='')
        {
          $.ajax({
              type : "POST" , //表單傳送方式 同form 的 method 屬性
              url  : "php/check_username.php" , //目的給哪個檔案 同form 的 action 屬性
              data : { // 為要傳過去的資料以物件方式呈現 因變數key值為英文的關係 , 所以用物件方式傳送  ex: {name : "輸入的id , password : "輸入的密碼"}
              'n'   : $(this).val() //代表要一個變數n的值 變數的值為username 文字方塊裡的值
            },
              dataType : 'html' //f設定網頁回應的檔案格式 html 格式
          }).done(function(data) {

               if(data == "T"){
                //代表此帳號註冊過已存在，submit取消
                alert("此帳號已註冊過!!!")
                $("#username").parent().removeClass('has-success').addClass('has-error');

                //$("#register_form button[type='submit']").addClass('disabled')
                $("#register_form button[type='submit']").attr('disabled',true)
               }
               else{
                //代表此帳號並無註冊過，拿掉取消的submit
                $("#username").parent().removeClass('has-error').addClass('has-success');
                $("#register_form button[type='submit']").attr('disabled',false)
               }

          }).fail(function(jqXHR,textStatus,errorThrown){
             //失敗的時候
             alert ("有錯誤產生，請查看console log");
             console.log(jqXHR,textStatus,errorThrown);
           });
        }
        else{
          //如果是空字串就不檢查
          //清除success與error 紅色與綠色方塊的提示
          $("#username").parent().removeClass('has-success').removeClass('has-error');
          $("#register_form button[type='submit']").attr('disabled',false)
        }
      });

       $(document).on("ready", function() {
        //當文件準備好時
        //當表單 sumbit 出去的時候
 				$("form").on("submit", function(){
 					if ($("#password").val() != $("#confirm_password").val()) {
            //判別兩者密碼是否相同正確,如不相同return false
            //把 input 的父標籤 加入 has-error，讓人知道哪個地方有錯誤，作為提醒
 						//為何要在父類別加has-error，請看 http://getbootstrap.com/css/#forms-control-validation
 						$("#password").parent().addClass("has-error");
 						$("#confirm_password").parent().addClass("has-error");

 	        	//若密碼都不一樣就警告。
 	          alert("兩次密碼輸入不一樣，請確認");
 	          //回傳 false 為了要阻止 from 繼續把資料送出去。

 	        }
          else{
            //密碼正確
            $.ajax({
                type : "POST" , //表單傳送方式 同form 的 method 屬性
                url  : "php/add_user.php" , //目的給哪個檔案 同form 的 action 屬性
                data : { // 為要傳過去的資料以物件方式呈現 因變數key值為英文的關係 , 所以用物件方式傳送  ex: {name : "輸入的id , password : "輸入的密碼"}
                'user'   : $("#username").val(),
                'pw'   : $("#password").val(),
                'name'   : $("#name").val()
              },
                dataType : 'html' //f設定網頁回應的檔案格式 html 格式
            }).done(function(data) {

                 console.log(data);
                 if(data == "T"){
                  alert("註冊成功!! ，請按確認轉跳登入頁面");
                  window.location.href="admin/index.php";
                 }
                 else{
                  alert("註冊失敗!! ，請確認電腦連線狀態~~");
                 }

            }).fail(function(jqXHR,textStatus,errorThrown){
               //失敗的時候
               alert ("有錯誤產生，請查看console log");
               console.log(jqXHR,textStatus,errorThrown);
             });
          }
          return false;
 				});
       });
     </script>
   </body>
  </html>




  
