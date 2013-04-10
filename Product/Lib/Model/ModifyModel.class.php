<?php
	class ModifyModel extends CommonModel{
		protected $_auto  = array(
			array("create_time","getNow","1","callback"),
			array("input_ip","get_client_ip","1","function"),
		 	);


		protected $_validate = array(
			array("drawing_name","require","必须输入图纸名称！"),
			array("product_name","require","必须输入机名！"),
			array("product_no","require","必须输入制造编号！"),
			array("drawing_no","require","必须输入图号"),
			array("Version","require","输入正确的版本号"),
			//array("modify_user_name","require","输入修改者姓名"),
			);		
	}
?>