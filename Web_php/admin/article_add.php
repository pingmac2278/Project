<?php

require_once '../php/db.php';

require_once '../php/function.php';

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
  header ("Location:login.php");
}

$datas = get_all_article();




?>

<!DOCTYPE html>
<html lang="zh-TW">
  <head>
      <!-- Alawys force latest IE rendering engine (even in intranet) & Chrome Frame
      Remove this if you use the .htaccess -->
      <meta http-equiv="X-A-Compatible" content="IE=edge , chrome=1">
      <title>文章新增</title>
      <meta name="description" content="Practice">
      <meta name="author" content="張家榮">

      <meta name="viewport" content="width=device-width, initial-scale=1" >
      <!-- laster Compiled and minified CSS-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
      <!--Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
      <link rel="shortcut icon" href="images/favicon.ico?1">

      <link rel="stylesheet" href="css/style.css?1222">
  </head>
 <body>
<?php include_once 'menu.php';?>
     <div class="content">
       <div class="alert alert-success" role="alert">
       <div class="container">
         <div class="row">
           <div class="col-xs-12">
             <form id="article">
                <div class="form-group">
                  <label for="title">標題</label>
                  <input type="text" class="form-control" id="title"  placeholder="輸入標題">
                <div class="form-group">
                  <label for="category">分類</label>
                  <select id="category" class="form-control">
                    <option value="科技">科技</option>
                    <option value="運動">運動</option>
                    <option value="旅遊">旅遊</option>
                    <option value="新聞">新聞</option>
                    <option value="氣象">氣象</option>
                    <option value="理財">理財</option>
                    <option value="電影">電影</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="content">內文</label>
                  <textarea id="content" class="form-control" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <label class="radio-form-inline"><input type="radio"  name="publish" value="1" checked>發佈</label>
                  <label class="radio-form-inline"><input  type="radio" name="publish" value="0">不發佈</label>
                </div>
                <button type="submit" class="btn btn-primary">存檔</button>

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
           $("#article").on("submit", function(){

             if($("#title").val() == '' || $("#content").val() ==''){
               alert("請寫標題與內文!");
             }
             else{
                   $.ajax({
                       type : "POST" , //表單傳送方式 同form 的 method 屬性
                       url  : "../php/add_article.php" , //目的給哪個檔案 同form 的 action 屬性
                       data : { // 為要傳過去的資料以物件方式呈現 因變數key值為英文的關係 , 所以用物件方式傳送  ex: {name : "輸入的id , password : "輸入的密碼"}
                       'title'   : $("#title").val(),
                       'category'   : $("#category").val(),
                       'content'   : $("#content").val(),
                       'publish'   : $("input[name='publish']:checked").val()
                     },
                       dataType : 'html' //f設定網頁回應的檔案格式 html 格式
                   }).done(function(data) {
                        if(data == "T"){
                          alert("新增成功，請點擊確認回到列表頁~")
                         window.location.href="article_list.php";
                        }
                        else{
                          alert("新增失敗!!"+ data)
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
