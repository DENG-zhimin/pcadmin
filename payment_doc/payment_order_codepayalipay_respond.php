<?php

/**
 * 订单支付同步入口
 */

// 默认绑定模块
$_GET['s'] = '/index/order/respond';

// 支付模块标记
define('PAYMENT_TYPE', 'CodePayAlipay');

// 根目录入口
define('IS_ROOT_ACCESS', true);

// 引入公共入口文件
require './public/index.php';
?>