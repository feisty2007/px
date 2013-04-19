<?php
	
	class CommonAction extends Action
	{

		//系统管理员应每年1月1日进行设定，
		//设定格式为添加本年度基准数值
		//"年（格式譬如2014）"=>
		//"min_modify_id"=>"上年度普通图纸最大修订编号（在product_modify_table里面，取上年的最大编号，譬如587）"
		//“min_nuclear_id"=>上年度核电图纸最大修订编号（在product_nuclear里面，取上年的最大编号）"
		//本系统从2013年开始，使用2013都设置为0
		//参考下面的格式
		protected $Jizhun=array(
			"2013"=>array(
				"min_modify_id"=>0,
				"min_nuclear_id"=>0
			)
		);


		public function GetThisYearId($modify_id,$b_is_nuclear)
		{
			$year=date('Y');

			if($b_is_nuclear)
			{
				$ret_id = $modify_id-$this->Jizhun[$year]['min_modify_id'];
			}
			else
			{
				$ret_id = $modify_id-$this->Jizhun[$year]['min_nuclear_id'];
			}

			return $ret_id;
		}


		public function is_Logined()
		{
			return session("?user_logined");
		}

		
		public function is_Editable()
		{
			$is_editable = true;
			if (session("?user_logined")!=1) {
				$is_editable=false;
			}
			else
			{
				$rights = session("user_right");

				$is_editable = (strstr($rights,"1,")!==false);
			}

			return $is_editable;
		}

		public function is_Newable()
		{
			$is_newable = true;

			if (session("?user_logined")!=1) {
				$is_newable=false;
			}
			else
			{
				$rights = session("user_right");

				$is_newable = (strstr($rights,"4,")!==false);
			}

			return $is_newable;
		}

		public function is_Userable()
		{
			$is_newable = true;

			if (session("?user_logined")!=1) {
				$is_newable=false;
			}
			else
			{
				$rights = session("user_right");

				$is_newable = (strstr($rights,"2,")!==false);
			}

			return $is_newable;	
		}

		public function toCsv($list)
		{
			foreach($list as $v){
		   		$this_year = date('y');
		   		// $isNu="P";
		   		// if($v["is_nuclear"] == 1)
		   		// 	$isNu="H";

		   		//$echono = $isNu.$this_year.'R-'.$v['id'];

		    	echo iconv("utf-8","gb2312",$v['modify_id']).",".iconv("utf-8","gb2312",$v["drawing_no"]).",".iconv("utf-8","gb2312",$v["drawing_name"]).",".iconv("utf-8","gb2312",$v["Version"]).",".iconv("utf-8","gb2312",$v['create_time']).",".iconv("utf-8","gb2312",$v['modify_user_name'])."\n";
		   }
		}
	}
?>