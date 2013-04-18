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

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../Public/bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../Public/bootstrap/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../Public/bootstrap/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../Public/bootstrap/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../Public/bootstrap/ico/favicon.png">

    <script src="../Public/bootstrap/js/jquery.js"></script>
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
          <a class="brand" href="__APP__">EBP</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <!-- <li class="active"><a href="__APP__">Home</a></li> -->
             <?php if(($_SESSION['user_logined']) == "1"): ?><li><a href="__APP__/Admin/index">欢迎你，<?php echo ($_SESSION['username']); ?>!</a></li>
                  <li><a href="__APP__/Admin/logout">注销</a></li>
              <?php else: ?>
                  <li class="active"><a href="__APP__/Admin/login">登录</a></li><?php endif; ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
                    <li class="nav-header">个人</li>
                    <li><a href="__APP__/Admin/changpassword">更改密码</a></li>                    
            </ul>

            <ul class="nav nav-list">
              <li class="nav-header">单据</li>
              <?php if(($is_newable) == "1"): ?><li><a href="__APP__/Modify/add">新建改图单</a></li>
                  <li><a href="__APP__/Part/add">标准件变更单</a></li><?php endif; ?>
              <?php if(($is_editable) == "1"): ?><li><a href="__APP__/Modify/select">编辑</a></li><?php endif; ?>
            </ul>

            <?php if(($is_userable) == "1"): ?><ul class="nav nav-list">
                    <li class="nav-header">用户管理</li>
                    <li><a href="__APP__/Admin/adduser">新建</a></li>
                    <li><a href="__APP__/Admin/listuser">查看</a></li>
                  </ul>
                  <ul class="nav nav-list">
                    <li class="nav-header">角色管理</li>
                    <li><a href="__APP__/Modify/selectthismonth">新建</a></li>
                    <li><a href="#">修改</a></li>
                    <li><a href="">权限查看</a></li>
                  </ul><?php endif; ?>

          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
            <div >
              
<fieldset>
      <div id="legend" class="">
        <legend class="">当前用户</legend>
      </div>
    
<table class="table table-hover table-condensed">
	 	<thead>
	        <tr>
	          <th>#</th>
	          <th>用户名</th>	          
	          <th>真实姓名</th>
	          <th>Email</th>          
	          <th>角色</th>
	          <th>当前状态<th>
	          <th>最后登录时间</th>
	          <?php if(($is_userable) == "1"): ?><th>编辑</th><?php endif; ?>
	        </tr>
	      </thead>
		  <tbody>
		  	 <?php if(is_array($vos)): $i = 0; $__LIST__ = $vos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		      <td><?php echo ($id); ?></td>		
		      <td><?php echo ($vo["username"]); ?></td>
		      <td><?php echo ($vo["realname"]); ?></td>
		      <td><?php echo ($vo["email"]); ?></td>	      
		      <td><?php echo ($vo["role_name"]); ?></td>
		      <td>
		      	<?php if(($vo["status"]) == "1"): ?>启用
		      	<?php else: ?>
		      		锁定<?php endif; ?>
		      </td>
		      <td><?php echo ($vo["lastlogin"]); ?></td>
		      <?php if(($is_editable) == "1"): ?><td>
	          		<a href="__APP__/Admin/modifyuser?id=<?php echo ($vo["id"]); ?>">编辑</a>
	          		<a href="__APP__/Admin/deleteuser?id=<?php echo ($vo["id"]); ?>">删除</a>
		         </td><?php endif; ?>
		    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		  </tbody>
	</table>
</field>
            </div>
        </div>
      </div>
    </div>
    <!-- Placed at the end of the document so the pages load faster -->    
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