<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------
namespace app\index\controller;

use think\Request;

/**
 * 空控制器响应
 * @author   ONE
* @version 1.0.0
 * @date    2018-11-30
 * @desc    description
 */
class Error extends Common
{
    /**
     * 空控制器响应
     * @author   ONE
    * @version 1.0.0
     * @date    2018-11-30
     * @desc    description
     * @param   Request         $request [参数]
     */
    public function Index(Request $request)
    {
        if(IS_AJAX)
        {
            exit(json_encode(DataReturn($request->controller().' 控制器不存在', -1000)));
        } else {
            $this->assign('msg', $request->controller().' 控制器不存在');
            return $this->fetch('public/error');
        }
    }
}
?>