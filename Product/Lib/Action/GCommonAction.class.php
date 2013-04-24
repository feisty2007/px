<?php
class GCommonAction extends Action {
  public function _initialize(){
     // 用户权限检查
        if (C('USER_AUTH_ON') && !in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE')))) {
            import('ORG.Util.RBAC');
            if (!RBAC::AccessDecision()) {
                //检查认证识别号
                if (!$_SESSION [C('USER_AUTH_KEY')]) {
                    //跳转到认证网关
                    redirect(PHP_FILE . C('USER_AUTH_GATEWAY'));
                }
                // 没有权限 抛出错误
                if (C('RBAC_ERROR_PAGE')) {
                    // 定义权限错误页面
                    redirect(C('RBAC_ERROR_PAGE'));
                } else {
                    if (C('GUEST_AUTH_ON')) {
                        $this->assign('jumpUrl', PHP_FILE . C('USER_AUTH_GATEWAY'));
                    }
                    // 提示错误信息
                    $this->error(L('_VALID_ACCESS_'));
                }
            }
        }
  }

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
    

  public function gselect($name, $id='', $where='', $order='id asc'){
    $model = M($name);
    if(!empty($id)){
      $result = $model->order($order)->select($id);
    }else if(!empty($where)){
      $result = $model->order($order)->where($where)->select();
    }else{
      $result = $model->order($order)->select();
    }
    return $result;
  }

 
}
