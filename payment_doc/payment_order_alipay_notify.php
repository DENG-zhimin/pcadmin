<?php

/**
 * 订单支付异步入口
 */

// 默认绑定模块
$_GET['s'] = '/api/ordernotify/notify';

// 支付模块标记
define('PAYMENT_TYPE', 'Alipay');

// 根目录入口
define('IS_ROOT_ACCESS', true);

// 引入公共入口文件
require './public/index.php';
?>