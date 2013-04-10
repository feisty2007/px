<?php
	class PartModel extends CommonModel{
		protected $_auto  = array(
			array("create_time","getNow","1","callback"),
			array("input_ip","get_client_ip","1","function"),
		 	);


		protected $_validate = array(
			array("part_name","require","必须输入存货编码！"),
			array("part_name","require","必须输入存货名称！"),
			array("part_no","require","必须输入规格型号！"),
			array("part_spec","require","必须输入更改类型"),
			);
	}
?>