<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------
namespace payment;

/**
 * 现金支付
 * @author   ONE
* @version 1.0.0
 * @date    2018-09-19
 * @desc    description
 */
class CashPayment
{
    // 插件配置参数
    private $config;

    /**
     * 构造方法
     * @author   ONE
    * @version 1.0.0
     * @date    2018-09-17
     * @desc    description
     * @param   [array]           $params [输入参数（支付配置参数）]
     */
    public function __construct($params = [])
    {
        $this->config = $params;
    }

    /**
     * 配置信息
     * @author   ONE
    * @version 1.0.0
     * @date    2018-09-19
     * @desc    description
     */
    public function Config()
    {
        // 基础信息
        $base = [
            'name'          => '现金支付',  // 插件名称
            'version'       => '0.0.1',  // 插件版本
            'apply_version' => '不限',  // 适用系统版本描述
            'desc'          => '现金方式支付货款',  // 插件描述（支持html）
            'author'        => 'Devil',  // 开发者
            'author_url'    => 'http://www.bowh.com/',  // 开发者主页
        ];

        // 配置信息
        $element = [
        ];

        return [
            'base'      => $base,
            'element'   => $element,
        ];
    }

    /**
     * 支付入口
     * @author   ONE
    * @version 1.0.0
     * @date    2018-09-19
     * @desc    description
     * @param   [array]           $params [输入参数]
     */
    public function Pay($params = [])
    {
        $url = $params['call_back_url'].'?';
        $url .= 'out_trade_no='.$params['order_no'];
        $url .= '&subject='.$params['name'];
        $url .= '&total_price='.$params['total_price'];
        return DataReturn('处理成功', 0, $url);
    }

    /**
     * 支付回调处理
     * @author   ONE
    * @version 1.0.0
     * @date    2018-09-19
     * @desc    description
     * @param   [array]           $params [输入参数]
     */
    public function Respond($params = [])
    {
        return DataReturn('处理成功', 0, $params);
    }
}
?>