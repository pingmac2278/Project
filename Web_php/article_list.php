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
      <title>所有文章</title>
      <meta name="description" content="Practice">
      <meta name="author" content="張家榮">
      <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
      <meta name="viewport" content="width=device-width, initial-scale=1" >
      <!-- laster Compiled and minified CSS-->
      <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
      <!--Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
      <link rel="shortcut icon" href="images/favicon.ico">

      <link rel="stylesheet" href="css/style.css?s1">
  </head>
 <body>
<?php include_once 'menu.php';?>
     <div class="content">
       <div class="alert alert-success" role="alert">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <?php if(!empty($datas)):?>
                  <?php foreach ($datas as $article):?>
                    <?php
                     $abstract = strip_tags($article['content']);
                     $abstract = mb_substr($abstract,0,200,"utf8");
                    ?>
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                         <h3 class="panel-title"><?php echo $article['title'];?></h3>
                           <div class="panel-body">
                          <p>
                          <span class="badge badge-secondar"><?php echo $article['category'];?></span>
                          <span class="badge badge-secondar"><?php echo $article['create_date'];?></span>
                           </p>
                           <?php echo $abstract . ". . . . ";?><a href="article.php?p=<?php echo $article['id'];?> " role="button">閱讀更多</a>
                        <hr class="my-4">
                        </div>
                     </div>
                   </div>
                    <?php endforeach ;?>
                    <?php endif;?>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <?php include_once 'footer.php';?>
            </body>
        </html>
