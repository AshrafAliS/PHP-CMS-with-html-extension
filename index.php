<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
define('pageclassconst', TRUE);
include_once 'admin/pages/pageClass.php';
$pageClass=new pagesClass();
$pageList=$pageClass->listPages();
$pid=$_GET[pid];
if($pid==""){
    $pageDetails=$pageClass->particularPageSlug($pageList[0]['URL']);
}
else
{
    $pageDetails=$pageClass->particularPageSlug($pid);
    if($pageDetails[id]==""){
        header("location:404.html");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $pageDetails["Description"] ?>">
    <meta name="keyword" content="<?php echo $pageDetails["Keywords"] ?>">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title><?php echo $pageDetails["Title"] ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
            <?php
                  $i=1;
                    if(count($pageList)){
                        foreach ($pageList as $value) {
                            echo '<a class="blog-nav-item" href="/cms/'.$value[URL].'">'.$value[PageName].'</a>';
                        }
                    }
            ?>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="row">
          
        <div class="col-sm-12 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $pageDetails["Title"] ?></h2>
            <hr>
            <?php echo $pageDetails["PageDetails"] ?>
          </div>
        </div>

      </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
