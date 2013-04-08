<?php
	class UserModel extends CommonModel {
		protected $_auto  = array(
			array("create_time","getNow","1","callback"),
			array("input_ip","get_client_ip","1","function"),
		 	);

		protected $_validate = array(
			array("username","require","用户名必须输入"),
			array("username","","用户名已经存在",1,'unique',1),
			array("password","require","请设置登陆密码"),
			array('re_password','password','确认密码不正确',0,'confirm'), 
			array('realname','require','用户真实姓名必须输入'), 
		);
	}
?>