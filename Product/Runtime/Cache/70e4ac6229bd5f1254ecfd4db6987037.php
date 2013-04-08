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
                  <li><a href="__APP__/Admin/logout">注销</a></li>
              <?php else: ?>
                  <li class="active"><a href="__APP__/Admin/login">登录</a></li><?php endif; ?>
              
              <!-- <li><a href="#about">查找</a></li> -->
              <!-- <li><a href="#contact">添加</a></li> -->
            </ul>
            <form class="navbar-form pull-right" method="post" action="__APP__/Modify/queryone">
              <input type="text" name="drawing_no" class="search-query" placeholder="输入图纸代号">
              <button type="submit" class="btn">查询</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
            
<div class="span8 offset2">
  <div class="hero-unit">
  <h3>欢迎!</h3>
  	<p>使用本系统可以<a href="__APP__/Modify/add">录入</a><span class="label label-warning">研发专用</span>图纸变化情况，还可以查看图纸变更情况，包括图纸版本、更改时间、修改人员等。</p>
    <p>当然也可以查看单张图纸的版本变化<span class="label label-warning">右上搜索</span></p>
  	<p>
        <a href="__APP__/Modify/querythisweek" class="btn btn-primary btn-large">本周统计&raquo;</a>
        <a href="__APP__/Modify/querythismonth" class="btn btn-primary btn-large">本月统计&raquo;</a>
    </p>
  </div>
  <hr/>
        <!-- Example row of columns -->

    
    <div>
      	<h3>最新修改列表</h3>
      <table class="table table-hover table-condensed">
     	<thead>
            <tr>
              <th>#</th>
              <th>图纸代号</th>
              <th>零件名称</th>
              <th>版本</th>          
              <th>修改日期</th>
              <th>修改工程师</th>
              <th>类型</th>
            </tr>
          </thead>
    	  <tbody>
    	  	 <?php if(is_array($ms)): $i = 0; $__LIST__ = $ms;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    	      <td><?php echo ($vo["id"]); ?></td>
    	      <td><a href="__APP__/Modify/queryone/?drawing_no=<?php echo (urlencode($vo["drawing_no"])); ?>"><?php echo ($vo["drawing_no"]); ?></a></td>
    	      <td><?php echo ($vo["drawing_name"]); ?></td>
    	      <td><?php echo ($vo["Version"]); ?></td>	      
    	      <td><?php echo ($vo["create_time"]); ?></td>
    	      <td><?php echo ($vo["modify_user_name"]); ?></td>
            <td><?php echo ($vo["modify_type"]); ?></td>
    	    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    	  </tbody>
    	</table>
      <p><a class="btn" href="__APP__/Modify/select">查看全部 &raquo;</a></p>
    </div>
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