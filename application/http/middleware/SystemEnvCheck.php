<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------
namespace app\http\middleware;

/**
 * 系统环境检查
 * @author   ONE
 
 * @version  0.0.1
 * @datetime 2016-12-01T21:51:08+0800
 */
class SystemEnvCheck
{
    /**
     * 入口
     * @author   ONE
    * @version 1.0.0
     * @date    2019-01-16
     * @desc    description
     * @param   [object]        $request [请求对象]
     * @param   \Closure        $next    [闭包]
     * @return  [object]                 [请求对象]
     */
    public function handle($request, \Closure $next)
    {
        // 环境检查
        $ret = $this->EnvironmentCheck();
        if($ret['code'] != 0)
        {
            exit(json_encode($ret));
        }

        return $next($request);
    }

    /**
     * 环境校验
     * @author   ONE
    * @version 1.0.0
     * @date    2018-12-07
     * @desc    description
     */
    public function EnvironmentCheck()
    {
        if(IS_AJAX)
        {
            // 请求参数数量校验是否超出php.ini限制
            $max_input_vars = intval(ini_get('max_input_vars'))-5;
            $params_counbt = count(input('post.'));
            if($params_counbt >= $max_input_vars)
            {
                return DataReturn('请求参数数量已超出php.ini限制[max_input_vars]', -1000);
            }
        }

        return DataReturn('success', 0);
    }
}
?>