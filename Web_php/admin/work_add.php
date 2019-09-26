<?php

require_once '../php/db.php';

require_once '../php/function.php';

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
  header ("Location:login.php");
}

$datas = get_all_works();




?>

<!DOCTYPE html>
<html lang="zh-TW">
  <head>
      <!-- Alawys force latest IE rendering engine (even in intranet) & Chrome Frame
      Remove this if you use the .htaccess -->
      <meta http-equiv="X-A-Compatible" content="IE=edge , chrome=1">
      <title>作品新增</title>
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
             <h2>新增作品</h2>
             <form id="work">
                <div class="form-group">
                  <label for="intro">簡介</label>
                  <textarea id="intro" class="form-control" rows="10"></textarea>
                <div class="form-group">
                  <label for="content">圖片上傳</label>
                  <input type="file" class="image" accept="image/png , image/gif , image/jpeg">
                  <input type="hidden" id="image_path" value="">
                  <div class= "show_image"></div>
                  <a href='javascript:void(0);' class="del_image btn btn-default">刪除</a>
                </div>
                <div class="form-group">
                  <label for="content">影片上傳</label>
                  <input type="file" class="video" accept="video/mp4 , video/">
                  <input type="hidden" id="video_path" value="">
                  <div class= "show_video"></div>
                  <a href='javascript:void(0);' class="del_video btn btn-default">刪除</a>
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
          $(document).on("ready", function() {

           /*圖片選擇後自動上傳
           */
           $("input.image").on("change",function(){
              var
                  file = $(this)[0].files[0] , //console.log($(this)[0].files[0]);
                  save_path = "files/images/" ,
                  form_data = new FormData();
                  form_data.append("file",file);
                  form_data.append("save_path", save_path);
                  console.log(form_data);
                  $("div.show_image").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');
                  $.ajax({

                    type : 'POST',
                    url  : '../php/upload_file.php',
                    data : form_data ,
                    cache : false , //因為只有上傳檔案 所以不要暫存
                    processData : false , //不要處理表單資訊
                    contentType : false , // 送過去的資訊由 FormData 產生 所以設定false
                    dataType : 'html'
                  }).done(function (data) {
                      if(data == "T"){
                        //顯示圖片
                        $("div.show_image").html("<img src='../" + save_path + file['name'] + "'>")
                        //把相對路徑放到input 裡面 submit才能抓到檔案
                        $("#image_path").val(save_path + file['name'] );
                      }
                      console.log(data);
                  }).fail(function(jqXHR,textStatus,errorThrown){
                     //失敗的時候
                     alert ("有錯誤產生，請查看console log");
                     console.log(jqXHR,textStatus,errorThrown);
                   });
               });
                 // 圖片刪除事件
                     $("a.del_image").on("click" , function(){
                       if($("#image_path").val() !=''){
                         var c = confirm("確定要刪除嗎??");
                         if (c){
                           $.ajax({

                             type : 'POST',
                             url  : '../php/del_file.php',
                             data : {
                               'file' : $("#image_path").val()
                             } ,
                             dataType : 'html'
                           }).done(function (data) {
                               if(data == "T"){
                                 //清除圖片
                                 $("div.show_image").html("");
                                 //把相對路徑清除
                                 $("#image_path").val('');
                                 //把選擇的檔案做清除
                                 $("input.image").val('');
                               }
                               console.log(data);
                           }).fail(function(jqXHR,textStatus,errorThrown){
                              //失敗的時候
                              alert ("有錯誤產生，請查看console log");
                              console.log(jqXHR,textStatus,errorThrown);
                            });
                           }
                         }
                      else{
                        alert("尚未上傳檔案，無法刪除!!")
                       }
                     });
          //------------------------------------
          /*影片選擇後自動上傳
          */
          $("input.video").on("change",function(){
             var
                 file = $(this)[0].files[0] , //console.log($(this)[0].files[0]);
                 save_path = "files/video/" ,
                 form_data = new FormData();
                 form_data.append("file",file);
                 form_data.append("save_path", save_path);
                 console.log(form_data);
                 $("div.show_video").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');
                 $.ajax({

                   type : 'POST',
                   url  : '../php/upload_file.php',
                   data : form_data ,
                   cache : false , //因為只有上傳檔案 所以不要暫存
                   processData : false , //不要處理表單資訊
                   contentType : false , // 送過去的資訊由 FormData 產生 所以設定false
                   dataType : 'html'
                 }).done(function (data) {
                     if(data == "T"){
                       //顯示影片
                       $("div.show_video").html("<video src='../" + save_path + file['name'] + "' controls>")
                       //把相對路徑放到input 裡面 submit才能抓到檔案
                       $("#video_path").val(save_path + file['name'] );
                     }
                     console.log(data);
                 }).fail(function(jqXHR,textStatus,errorThrown){
                    //失敗的時候
                    alert ("有錯誤產生，請查看console log");
                    console.log(jqXHR,textStatus,errorThrown);
                  });
              });
                // 圖片刪除事件
                    $("a.del_video").on("click" , function(){
                     if($("#video_path").val() !=''){
                        var c = confirm("確定要刪除嗎??");
                        if (c){
                          $.ajax({

                            type : 'POST',
                            url  : '../php/del_file.php',
                            data : {
                              'file' : $("#video_path").val()
                            } ,
                            dataType : 'html'
                          }).done(function (data) {
                              if(data == "T"){
                                //清除圖片
                                $("div.show_video").html("");
                                //把相對路徑清除
                                $("#video_path").val('');
                                //把選擇的檔案做清除
                                $("input.video").val('');
                              }
                              console.log(data);
                          }).fail(function(jqXHR,textStatus,errorThrown){
                             //失敗的時候
                             alert ("有錯誤產生，請查看console log");
                             console.log(jqXHR,textStatus,errorThrown);
                           });
                          }
                        }
                     else{
                       alert("尚未上傳檔案，無法刪除!!")
                      }
                    });
           //當文件準備好時表單 sumbit 出去的時候
           $("#work").on("submit", function(){

             if($("#intro").val() == '' ){
               alert("請填寫簡介!");
             }
             else{
                   $.ajax({
                       type : "POST" , //表單傳送方式 同form 的 method 屬性
                       url  : "../php/add_work.php" , //目的給哪個檔案 同form 的 action 屬性
                       data : { // 為要傳過去的資料以物件方式呈現 因變數key值為英文的關係 , 所以用物件方式傳送  ex: {name : "輸入的id , password : "輸入的密碼"}
                       'intro'   : $("#intro").val(),
                       'image_path'   : $("#image_path").val(),
                       'video_path'   : $("#video_path").val(),
                       'publish'   : $("input[name='publish']:checked").val()
                     },
                       dataType : 'html' //設定網頁回應的檔案格式 html 格式
                   }).done(function(data) {
                        if(data == "T"){
                          alert("新增成功，請點擊確認回到列表頁~");
                         window.location.href = "work_list.php";
                        }
                        else{
                          alert("新增失敗!!"+ data);
                        }

                   }).fail(function(jqXHR,textStatus,errorThrown){
                      //失敗的時候
                      alert ("有錯誤產生，請查看console log");
                      console.log(jqXHR.textStatus.errorThrown);
                    });
             }
             return false;
           });
          });
    </script>
  </body>
</html>
