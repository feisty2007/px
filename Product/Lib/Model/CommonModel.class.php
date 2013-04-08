<?php
	class CommonModel extends Model {
		public function getNow(){
			return date('Y-m-d H:i:s');
		}		
	}
?>