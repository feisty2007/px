<?php
	/**
	* 图纸更改单类
	*/
	class ModifyAction extends CommonAction
	{
		public function Add()
		{
			if(!$this->is_Logined())
			{
				$this->assign("jumpUrl","__APP__/Admin/login");
				$this->success("添加记录，请登陆");
			}
			else
			{
				if(!$this->is_Newable())
				{
					$this->assign("jumpUrl","__APP__");
					$this->error("当前用户权限不足，无法新增");
				}
				else
				{
					$this->display();
				}
			}
		}
		
		public function AddByTemplate()
		{
			if(!$this->is_Logined())
			{
				$this->assign("jumpUrl","__APP__/Admin/login");
				$this->success("添加记录，请登陆");
			}
			else
			{
				if(!$this->is_Newable())
				{
					$this->assign("jumpUrl","__APP__");
					$this->error("当前用户权限不足，无法新增");
				}
				else
				{
					if(isset($_POST['submit']))
					{
						$modify = D('Modify');						
						if($modify->create()){
							$modify_id = $modify->add();

							if($modify_id){
								$this->success("Add Success");
							}
							else
							{
								$this->error("Add error");
							}
						}
						else
						{
							$this->error($modify->getError());
						}
					}
					else
					{
						$DAO=D('Modify');
						
						if( isset($_POST['id']) | isset($_GET['id']) )
						{
							$id=$this->_param('id');
							$vos=$DAO->where('id='.$id)->select();
							$this->vo=$vos[0];
							$this->display();
						}
						else
						{
							$this->display();
						}
					}
				}
			}
		}


		public function Insert()
		{
			$modify = D('Modify');
			//$modify->create_time=time();
			//$modify->input_ip=$this->_SERVER['REMOTE_ADDR'];
			if($modify->create()){
				$modify_id = $modify->add();

				if($modify_id){
					$year=date('y');

					$is_nuclears = $modify->field("is_nuclear")->where('id='.$modify_id)->select();
					$is_nuclear = $is_nuclear[0]['is_nuclear'];

					$type_flage = 'P';
					if($is_nuclear==1)
						$type_flage = 'H';

					$all_modify_id=$type_flage.$year."R-".$modify_id;
					$this->assign("jumpUrl","__APP__");
					$this->assign("waitSecond",5);
					$this->success("添加成功！系统更改编号:<font color=red>".$all_modify_id."</font>");
					//$this->assign("jumpUrl","__APP__/Modify/select");
					//$this->success("添加成功！");
				}
				else
				{
					$this->error("添加错误！");
				}
			}
			else
			{
				$this->error($modify->getError());
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
		    $this->is_editable=$this->is_editable();
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
				$this->is_editable=$this->is_editable();
				$this->is_newable=$this->is_Newable();

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

			$list = $DAO->query("select id,is_nuclear,drawing_no,drawing_name,id,modify_user_name,create_time,Version from product_modify where YEARWEEK(date_format(create_time,'%Y-%m-%d'))=YEARWEEK(now()) order by id desc");

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
 
		   $list = $DAO->query("select id,is_nuclear,drawing_no,drawing_name,id,modify_user_name,create_time,Version from product_modify where date_format(create_time,'%Y-%m')=date_format(now(),'%Y-%m') order by id desc");

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

		public function ModifyOne()
		{
			if (session("user_logined")!=1) {
				$this->assign("jumpUrl","__APP__/Admin/login");
				$this->error("修改图纸，请登陆！");
			}
			else
			{
				$user_id = session("user_id");
				$DAO = D();
				$rights = $DAO->query("SELECT role_right FROM product_role INNER JOIN product_user ON product_user.role_id=product_role.id WHERE product_user.id=".$user_id);
				
				$right = $rights[0]['role_right'];

				$is_editable = (strstr($right,"1,")!==false);

				if(!$is_editable)
				{
					$this->error("当前用户权限不足，无法修改");
				}
				else
				{
					if(isset($_POST["submit"])){
						$modify = D("modify");

						if($modify->create())
						{
							$modify->update_user_id=session("user_id");
							$modify->update_time=date("Y-m-d H:i:s");

							if(isset($_POST['is_nuclear']))
							{
								$modify->is_nuclear=1;
							}
							else
							{
								$modify->is_nuclear=0;
							}

							$result = $modify->save();

							if($result)
							{
								$this->assign("jumpUrl","__APP__/Modify/select");
								$this->success("修改成功");
							}
							else
							{
								$this->error("修改失败！");
							}
						}
						else
						{
							$this->error("修改失败2！");
						}
					}
					else
					{
						$modify = D('modify');
						$id = $this->_param("id"); 						
						$this->vo = $modify->find($id);
						$this->display();
					}
				}
			}
		}	

		public function Disable()
		{
			if(!$this->is_editable())
			{
				$this->error("当前用户权限不足，无法修改");	
			}
			else
			{
				$modify = D('modify');
				$id=$this->_param("id");
				$update_array = array("status"=>"0");
				$result = $modify->where("id=".$id)->setField($update_array);
				
				if($result)
				{
					$this->assign("jumpUrl","__APP__/Modify/select");
					$this->success("修改成功");
				}
				else
				{
					$this->error("修改失败！");
				}	
			}
		}	
	}
?>