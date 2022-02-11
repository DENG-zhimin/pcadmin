<?php
// +----------------------------------------------------------------------
// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 路由规则
// +----------------------------------------------------------------------

// 分隔符
$ds = MyC('common_route_separator', '-', true);

// 首页
Route::get('/', 'index/index');

Route::rule('estate2', PluginsIndexUrl('estate', 'index', 'index'));
Route::rule('estate', PluginsIndexUrl('estate', 'index', 'index'));

// 商品详情
Route::get('goods'.$ds.':id', 'index/goods/index');

// 搜索
Route::get('search'.$ds.'c'.$ds.':category_id', 'index/search/index');
Route::get('search'.$ds.'k'.$ds.':keywords', 'index/search/index');
Route::rule('search', 'index/search/index', 'GET|POST');

// 分类
Route::get('category', 'index/category/index');

// 自定义页面
Route::get('custom'.$ds.':id', 'index/customview/index');

// 购物车
Route::get('cart', 'index/cart/index');

// 订单确认
Route::rule('buy', 'index/buy/index', 'GET|POST');

// 文章
Route::get('article'.$ds.':id', 'index/article/index');

// 用户
Route::get('user', 'index/user/index');
Route::get('login', 'index/user/logininfo');
Route::get('login'.$ds.'modal', 'index/user/modallogininfo');
Route::get('regster', 'index/user/reginfo');
Route::get('regster'.$ds.'sms', 'index/user/smsreginfo');
Route::get('regster'.$ds.'email', 'index/user/emailreginfo');
Route::get('forget', 'index/user/forgetpwdinfo');
Route::get('logout', 'index/user/logout');
?>