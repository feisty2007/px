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
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    </style>
    <link href="../Public/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../Public/bootstrap/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../Public/bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../Public/bootstrap/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../Public/bootstrap/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../Public/bootstrap/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../Public/bootstrap/ico/favicon.png">
  </head>

  <body>
    <div class="container">

      <form class="form-signin" method=post action="__APP__/Admin/login">
        <h2 class="form-signin-heading">登陆</h2>
        <input type="text" class="input-block-level" placeholder="用户名" name="username">
        <input type="password" class="input-block-level" placeholder="密码" name="password">
        <button class="btn btn-large btn-primary" type="submit" name="submit">登陆</button>
      </form>

    </div> <!-- /container -->


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