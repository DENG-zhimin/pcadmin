<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------
namespace payment;

use app\service\IntegralService;
use app\service\OrderService;
use think\Db;

/**
 * 现金支付
 * @author   ONE
* @version 1.0.0
 * @date    2018-09-19
 * @desc    description
 */
class BalancePayment
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
            'name'          => '余额支付',  // 插件名称
            'version'       => '0.0.1',  // 插件版本
            'apply_version' => '不限',  // 适用系统版本描述
            'desc'          => '余额方式支付货款',  // 插件描述（支持html）
            'author'        => 'Devil',  // 开发者
            'author_url'    => 'http://www.bowh.com/',  // 开发者主页
        ];

        // 配置信息
        $element = [
            [
                'element'       => 'input',
                'type'          => 'text',
                'default'       => '',
                'name'          => 'credittype',
                'placeholder'   => '关联的账户字段',
                'title'         => '余额字段',
                'is_required'   => 1,
                'message'       => '请填写余额字段',
            ],
        ];

        // 资料信息
        $config = [
            [
                'credittype'       => 'money',
            ],
        ];

        return [
            'base'      => $base,
            'element'   => $element,
            'config'   => $config,
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
        // 参数
        if(empty($params))
        {
            return DataReturn('参数不能为空', -1);
        }
        // 配置信息
        if(empty($this->config))
        {
            return DataReturn('支付缺少配置', -1);
        }
        $user_id = intval($params['user']['id']);
        $money = trim($params['total_price']);
        $name = trim($params['name']);
        $paymentinfo = array();
        $paymentinfo['type'] = 'balance';
        $res = IntegralService::UserIntegralAdd($user_id, 'money', $money, $name, 0, 0, \XinConst::PAYMENT_GOODS_ORDER, $paymentinfo);
        if($res['code']!=0){
            return DataReturn('支付失败，可用余额不足', -1);
        }
        return DataReturn('处理成功', 0);
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