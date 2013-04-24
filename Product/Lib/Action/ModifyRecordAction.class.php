<?php
	class ModifyRecordAction extends CommonAction {

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
		
		public function Select()
		{
			$Data = D('modify');

			//$this->ms = $modify->order("id desc")->select();
			import('ORG.Util.Page');// 导入分页类
		    $count = $Data->where('status=1')->count();// 查询满足要求的总记录数
		    $Page  = new Page($count);// 实例化分页类 传入总记录数
		    // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		    $nowPage = isset($_GET['p'])?$_GET['p']:1;
		    $list = $Data->where('status=1')->order('id desc')->page($nowPage.','.$Page->listRows)->select();
		    $show  = $Page->show();// 分页显示输出
		    $this->assign('page',$show);// 赋值分页输出
		    $this->assign('ms',$list);// 赋值数据集
		    $this->is_editable=$this->is_modify_editable();
		    $this->display(); // 输出模板


			//$this->display();
		}

		public function SelectThisMonth()
		{
			$DAO = D();

			$list = $DAO->query("select drawing_no,drawing_name,id,modify_user_name,create_time,Version from product_modify where date_format(create_time,'%Y-%m')=date_format(now(),'%Y-%m') order by id desc");
			//$this->ms = $modify->whrere("DATE_FORMAT(create_time,'%Y%m')=DATE_FORMAT(CURDATE(),'%Y%m')")->order("id desc")->select();
			if($list){
     		   $this->assign('ms', $list );
        	   $this->display();
    		} else {
        		$this->error($DAO->getError());
    		}
			//$this->display("select.html");
		}

		public function QueryOne()
		{
			# code...
			$DAO = D("modify");
			$gw=$_GET["drawing_no"];
			$gp=$_POST["drawing_no"];

			if(isset($gw) or isset($gp)){			
				$drawing_no = urldecode($this->_param("drawing_no")); 
				$drawing_no = explode(" ", $drawing_no)[0];
				$condition = new stdClass();
				$condition->status=1;
				$condition->drawing_no= $drawing_no;
				$this->mscount=$DAO->where($condition)->count();
				$this->ms=$DAO->where($condition)->order('id desc')->select(); 
				$this->drawing_no=$drawing_no;
				$this->is_editable=$this->is_modify_editable();
				$this->is_newable=$this->is_modify_Newable();

				$this->display();
			}
			else
			{
				$this->error("没有可查询的图纸代号");
			}
		}

		

		public function QueryThisWeek()
		{
			$DAO = D();

			$list = $DAO->query("select modify_id,is_nuclear,drawing_no,drawing_name,id,modify_user_name,create_time,Version from product_modify where YEARWEEK(date_format(create_time,'%Y-%m-%d'))=YEARWEEK(now()) and status=1 order by id desc");

		   $filename=strtotime("now").".csv";
   		   header("Content-Type:application/vnd.ms-excel;charset=UTF-8");
		   Header("Accept-Ranges:bytes");
		   header("Pragma:public");
		   header("Expires:0");
		   header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
		   header('Content-Disposition:attachment; filename="'.$filename.'"');
		   header("Content-Transfer-Encoding:binary");
		   
		   echo iconv("utf-8","gb2312","变更单号,图纸代号,零件名称,版本号,修改日期,修改人员\n");
		   
		   $this->toCsv($list);
		   die();		  
		}

		public function QueryThisMonth()
		{
		   $DAO = D();
 
		   $list = $DAO->query("select modify_id,is_nuclear,drawing_no,drawing_name,id,modify_user_name,create_time,Version from product_modify where date_format(create_time,'%Y-%m')=date_format(now(),'%Y-%m') and status=1 order by id desc");

		   $filename=strtotime("now").".csv";
   		   header("Content-Type:application/vnd.ms-excel;charset=UTF-8");
		   Header("Accept-Ranges:bytes");
		   header("Pragma:public");
		   header("Expires:0");
		   header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
		   header('Content-Disposition:attachment; filename="'.$filename.'"');
		   header("Content-Transfer-Encoding:binary");
		   
		   echo iconv("utf-8","gb2312","变更单号,图纸代号,零件名称,版本号,修改日期,修改人员\n");
		   
		   $this->toCsv($list);
		   die();		  	
		}

		public function ListAccess()
		{
			//print_r();
			echo var_export($_SESSION['_ACCESS_LIST'],true);
		}
	}
?>