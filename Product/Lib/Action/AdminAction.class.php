<?php
	class AdminAction extends CommonAction{
		public function Login()
		{
			if(isset($_POST["submit"])){
				$user = D("user");

				$condition = new stdClass();
				$username = $this->_post("username");
				$condition->username = $username;
				$condition->password = $this->_post("password");
				$condition->status = 1;

				$count=$user->where($condition)->count();				
				if($count==1){
					$user_ids = $user->field("id")->where($condition)->select();
					$user_id = $user_ids[0]['id'];
					//import('ORG.Util.Session');
					//$user['id']=$user_id;
					$user_new['lastlogin']=date('Y-m-d H:i:s');
					$user->where('id='.$user_id)->save($user_new);

					$DAO = D();
					$rights = $DAO->query("SELECT role_right FROM product_role INNER JOIN product_user ON product_user.role_id=product_role.id WHERE product_user.id=".$user_id);
				
					$right = $rights[0]['role_right'];

					session("user_logined",1);

					$User = D("user");
					$users = $User->field("realname")->where('id='.$user_id)->select();
					$vUsername = $users[0]['realname'];
					session("username",$vUsername);
					session("user_id",$user_id);
					session("user_right",$right);
					if($username == "admin")
					{
						$this->assign("jumpUrl","__APP__/Admin/index");	
					}
					else
					{
						$this->assign("jumpUrl","__APP__");
					}

					$this->success("登陆成功！");
				}
				else
				{
					$this->error("登陆失败！");
				}

			}
			else{
				$this->display();
			}
		}

		public function Logout()
		{
			session(null);
			$this->assign("jumpUrl","__APP__");
			$this->success("退出登录成功");
		}

		public function Index()
		{
			$this->is_newable = $this->is_Newable();
			$this->is_userable = $this->is_Userable();
			$this->is_editable = $this->is_Editable();

			$this->display();
		}


		public function AddUser()
		{
			$this->is_newable = $this->is_Newable();
			$this->is_userable = $this->is_Userable();
			$this->is_editable = $this->is_Editable();

			if(!isset($_POST["submit"]))
			{
				$DAO = D('role');				
				$this->vos = $DAO->where("id!=1")->order("id desc")->select();				
				$this->display();
			}
			else
			{
				$modify = D('user');			
				if($modify->create()){
					$modify_id = $modify->add();

					if($modify_id){
						$this->success("添加用户成功！");
					}
					else
					{
						$this->error("添加用户失败");
					}
				}
				else
				{
					$this->error($modify->getError());
				}

				//$this->success("添加用户成功！");
			}
		}

		public function ListUser()
		{
			$this->is_newable = $this->is_Newable();
			$this->is_userable = $this->is_Userable();
			$this->is_editable = $this->is_Editable();

			if(!isset($_POST["submit"]))
			{
				$DAO = D('');
				$this->vos = $DAO->query("SELECT product_user.id,product_user.username,product_user.realname,product_user.email,product_user.lastlogin,product_user.status,product_role.role_name FROM product_user INNER JOIN product_role ON product_user.role_id=product_role.id");				
				$this->display();
			}
			else
			{
				$this->success("添加用户成功！");
			}

		}

		public function ModifyUser()
		{

		}

		public function DeleteUser()
		{

		}

		public function AddRole()
		{

		}

		public function ModifyRole()
		{

		}

		public function AddRight()
		{

		}

		public function ListRight()
		{

		}

		public function ModifyRight()
		{

		}

		public function DeleteRight()
		{

		}
	}
?>