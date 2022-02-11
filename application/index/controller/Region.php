<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------
namespace app\index\controller;

use app\service\RegionService;

/**
 * 地区
 * @author   ONE

 * @version  0.0.1
 * @datetime 2016-12-01T21:51:08+0800
 */
class Region extends Common
{
    /**
     * 构造方法
     * @author   ONE
    * @version 1.0.0
     * @date    2018-11-30
     * @desc    description
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取地区
     * @author   ONE
    * @version 1.0.0
     * @date    2018-09-21
     * @desc    description
     */
    public function Index()
    {
        // 是否ajax请求
        if(!IS_AJAX)
        {
            $this->error('非法访问');
        }

        // 获取地区
        $params = [
            'where' => [
                'pid'   => intval(input('pid', 0)),
            ],
        ];
        $data = RegionService::RegionNode($params);
        return DataReturn('操作成功', 0, $data);
    }
}
?>