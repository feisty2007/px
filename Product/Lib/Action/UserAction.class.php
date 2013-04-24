<?php
	class UserAction extends CommonAction{
		public function ChangePassword()
		{
			
			$this->is_newable = $this->is_modify_Newable();
			$this->is_userable = $this->is_Userable();
			$this->is_editable = $this->is_modify_Editable();
			if(!isset($_POST['submit']))
			{
				//$this->assign("user_id",session("user_id"));
				$this->display();
			}
			else
			{
				$old_pass=$this->_param('old_pass');
				$new_pass=$this->_param('new_pass');
				$new2_pass=$this->_param('new2_pass');
				$user_id=$this->_param('user_id');					

				$DAO = D('user');

				$condition=new stdClass();
				$condition->id=$user_id;
				$condition->password=md5($old_pass);

				$count=$DAO->where($condition)->count();
				if($count==1)
				{
					$user['id']=$user_id;
					$user['password']=md5($new_pass);

					if($DAO->save($user))
					{
						$this->assign("jumpUrl","__APP__");
						$this->success("修改密码成功!");
					}
					else
					{
						$this->error("修改密码错误！");
					}
				}
				else
				{
					$this->error("旧密码错误！");
				}
				
			}			
		}
	}
?>