<?php
	
	class CommonAction extends Action
	{
		public function is_Logined()
		{
			return session("?user_logined");
		}

		
		public function is_Editable()
		{
			$is_editable = true;
			if (session("user_logined")!=1) {
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

			if (session("user_logined")!=1) {
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

			if (session("user_logined")!=1) {
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
		   		$isNu="P";
		   		if($v["is_nuclear"] == 1)
		   			$isNu="H";

		   		$echono = $isNu.$this_year.'R-'.$v['id'];

		    	echo $echono.",".iconv("utf-8","gb2312",$v["drawing_no"]).",".iconv("utf-8","gb2312",$v["drawing_name"]).",".iconv("utf-8","gb2312",$v["Version"]).",".iconv("utf-8","gb2312",$v['create_time']).",".iconv("utf-8","gb2312",$v['modify_user_name'])."\n";
		   }
		}
	}
?>