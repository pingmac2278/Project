<?php

require_once '../php/db.php';

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
  header ("Location:login.php");
}

?>

<!DOCTYPE html>
<html lang="zh-TW">
  <head>
      <!-- Alawys force latest IE rendering engine (even in intranet) & Chrome Frame
      Remove this if you use the .htaccess -->
      <meta http-equiv="X-A-Compatible" content="IE=edge , chrome=1">
      <title>後端頁面</title>
      <meta name="description" content="Practice">
      <meta name="author" content="張家榮">

      <meta name="viewport" content="width=device-width, initial-scale=1" >
      <!-- laster Compiled and minified CSS-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
      <!--Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
      <link rel="shortcut icon" href="images/favicon.ico?1">

      <link rel="stylesheet" href="css/style.css?22 ">
  </head>
 <body>
<?php include_once 'menu.php';?>
     <div class="content">
      <div class="alert alert-success" role="alert">
       <div class="container">
         <div class="row">
           <div class="col-xs-12">
             <h3 class="welcome">歡迎</h3>
             <p class="welcome">來到後端管理頁面!!</p><hr>
             <p class="welcome">Welcome Come to Backend Management Page...</p>
             </div>
           </div>
         </div>
       </div>
     </div>
<?php include_once 'footer.php';?>
    </body>
</html>
