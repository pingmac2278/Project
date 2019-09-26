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
      <title>文章列表</title>
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
         <div class="row add_button">
           <div class="col-xs-12">
             <a href="article_add.php" class="btn btn-primary">新增文章</a>
             </div>
           </div>
         <div class="row">
           <div class="col-xs-12">
             <table class="table table-hover table-bordered">
               <thead class="color">
                 <tr>
                   <th>標題</th>
                   <th>分類</th>
                   <th>是否發布</th>
   								 <th>建立時間</th>
                   <th>管理動作</th>
                 </tr>
               </thead>
                       <?php if(!empty($datas)):?>
                       <?php foreach ($datas as $a_data) :?>
                 <tr>
                   <td><?php echo $a_data['title'];?></td>
                   <td><?php echo $a_data['category'];?></td>

                   <td><?php echo ($a_data['publish'])?"發佈中":"下架中";?></td>
										<td><?php echo $a_data['create_date'];?></td>
                   <td>
                     <a href='article_edit.php?i=<?php echo $a_data['id'];?>' class="btn btn-success">編輯</a>
                     <a href='javascript:void(0);' class='btn btn-danger del_article' data-id="<?php echo $a_data['id'];?>">刪除</a>
                   </td>
                 </tr>
                      <?php endforeach;?>
                      <?php else:?>
                 <tr>
                   <td colspan="5">無資料</td>
                 </tr>
                      <?php endif;?>
             </table>
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

            $("a.del_article").on("click",function(){
              var c = confirm("你確定要刪除嗎?");

              this_tr = $(this).parent().parent();


              if(c)
              {
                $.ajax({
                    type : "POST" , //表單傳送方式 同form 的 method 屬性
                    url  : "../php/del_article.php" , //目的給哪個檔案 同form 的 action 屬性
                    data : { // 為要傳過去的資料以物件方式呈現 因變數key值為英文的關係 , 所以用物件方式傳送  ex: {name : "輸入的id , password : "輸入的密碼"}
                    'id'   : $(this).attr("data-id")
                  },
                    dataType : 'html' //f設定網頁回應的檔案格式 html 格式
                }).done(function(data) {
                     if(data == "T"){
                       alert("刪除成功，請點擊確認移除資料~")
                       this_tr.fadeOut();
                     }
                     else{
                       alert("更新失敗!!"+ data)
                     }

                }).fail(function(jqXHR,textStatus,errorThrown){
                   //失敗的時候
                   alert ("有錯誤產生，請查看console log");
                   console.log(jqXHR,textStatus,errorThrown);
                 });
              }
            });
         });
    </script>


  </body>
</html>
