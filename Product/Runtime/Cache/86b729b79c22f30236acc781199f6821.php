<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>EBP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../Public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="../Public/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../Public/bootstrap/js/html5shiv.js"></script>
    <![endif]-->

    <script type="text/javascript">
          window.UEDITOR_HOME_URL = "../Public/ueditor/";
    </script>
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../Public/bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../Public/bootstrap/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../Public/bootstrap/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../Public/bootstrap/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../Public/bootstrap/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="__APP__">HOME</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <?php if(($_SESSION['user_logined']) == "1"): ?><li><a href="__APP__/Admin/index">欢迎你，<?php echo ($_SESSION['username']); ?>!</a></li>
                  <li><a href="__APP__/Public/logout">注销</a></li>
              <?php else: ?>
                  <li class="active"><a href="__APP__/Public/login">登录</a></li><?php endif; ?>
              
              <!-- <li><a href="#about">查找</a></li> -->
              <!-- <li><a href="#contact">添加</a></li> -->
            </ul>
            <form class="navbar-form pull-right" method="post" action="__APP__/ModifyRecord/queryone">
              <input type="text" name="drawing_no" class="search-query" placeholder="输入图纸代号">
              <button type="submit" class="btn">查询</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
            
<div class="span8 offset2">
	{ _SESSION['_ACCESS_LIST'] }
</div>        
    </div>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../Public/bootstrap/js/jquery.js"></script>
    <script src="../Public/bootstrap/js/bootstrap-transition.js"></script>
    <script src="../Public/bootstrap/js/bootstrap-alert.js"></script>
    <script src="../Public/bootstrap/js/bootstrap-modal.js"></script>
    <script src="../Public/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="../Public/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="../Public/bootstrap/js/bootstrap-tab.js"></script>
    <script src="../Public/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="../Public/bootstrap/js/bootstrap-popover.js"></script>
    <script src="../Public/bootstrap/js/bootstrap-button.js"></script>
    <script src="../Public/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="../Public/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="../Public/bootstrap/js/bootstrap-typeahead.js"></script>

  </body>
</html>