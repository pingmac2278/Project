<?php

require_once 'php/db.php';

require_once 'php/function.php' ;

$datas = get_publish_work();



?>

<!DOCTYPE html>
<html lang="zh-TW">
  <head>
      <!-- Alawys force latest IE rendering engine (even in intranet) & Chrome Frame
      Remove this if you use the .htaccess -->
      <meta http-equiv="X-A-Compatible" content="IE=edge , chrome=1">
      <title>所有作品</title>
      <meta name="description" content="Practice">
      <meta name="author" content="張家榮">
      <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
      <meta name="viewport" content="width=device-width, initial-scale=1" >
      <!-- laster Compiled and minified CSS-->
      <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
      <!--Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
      <link rel="shortcut icon" href="images/favicon.ico">

      <link rel="stylesheet" href="css/style.css?s">
  </head>
 <body>
<?php include_once 'menu.php';?>
     <div class="content">
       <div class="alert alert-success" role="alert">
          <div class="container">
            <div class="row">
                <?php if(!empty($datas)):?>
                  <?php foreach ($datas as $works):?>
                    <div class="col-xs-12 col-sm-4">
                      <div class="thumbnail">
                          <img src ="<?php echo $works['image_path'];?>">
                          <div class="caption">
                            <h5 class="mt-0"><?php echo $works['intro'];?></h5>
                            <p><a href="work.php?p=<?php echo $works['id'];?>" class="btn btn-primary" role="button">查看</a></p>

                      </div>
                    </div>
                    <?php endforeach ;?>
                    <?php else:?>
                    <h1>目前暫無新作品</h1>
                    <?php endif;?>
                 </div>
               </div>
             </div>
           </div>
           <?php include_once 'footer.php';?>
        </body>
      </html>
