<?php
	class PartAction extends CommonAction{
		public function Add()
		{
			if(!$this->is_Logined())
			{
				$this->assign("jumpUrl","__APP__/Admin/login");
				$this->error("<font color=red>登陆先，亲！</font>");
			}
			else
			{
				if(!$this->is_newable())
				{
					$this->assign("jumpUrl","__APP__");
					$this->error("当前用户无权填写标准件更改单据!");					
				}			
				else
				{
					if(!isset($_POST['submit']))
					{
						$this->display();
					}				
					else
					{
						$Gbs=D("Part");

						if($Gbs->create())
						{
							$gbs_id=$Gbs->add();
							if($gbs_id)
							{						
								$this->success("添加标准件申请成功！");
							}
							else
							{
								$this->error("添加失败！");
							}
						}
						else
						{
							$this->error("添加失败2！");
						}
					}
				}
			}
		}

		public function ListGb()
		{
			$DAO=D("part");

			$vos = $DAO->order("id desc")->limit(40)->select();
			$this->assign("vos",$vos);

			$this->display();
		}
	}
?>