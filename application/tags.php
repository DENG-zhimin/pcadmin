<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------

// 应用行为扩展定义文件
return array (
  'app_init' => 
  array (
  ),
  'app_begin' => 
  array (
  ),
  'module_init' => 
  array (
  ),
  'action_begin' => 
  array (
  ),
  'view_filter' => 
  array (
  ),
  'app_end' => 
  array (
  ),
  'log_write' => 
  array (
  ),
  'plugins_view_common_top' => 
  array (
  ),
  'plugins_view_user_center_top' => 
  array (
  ),
  'plugins_service_user_login_end' => 
  array (
  ),
  'plugins_css' => 
  array (
  ),
  'plugins_js' => 
  array (
  ),
  'plugins_view_common_bottom' => 
  array (
    2 => 'app\\plugins\\expressforkdn\\Hook',
  ),
  'plugins_service_navigation_header_handle' => 
  array (
    0 => 'app\\plugins\\answers\\Hook',
  ),
  'plugins_admin_view_common_bottom' => 
  array (
    0 => 'app\\plugins\\expressforkdn\\Hook',
  ),
  'plugins_common_page_bottom' => 
  array (
    0 => 'app\\plugins\\expressforkdn\\Hook',
  ),
  'plugins_admin_common_page_bottom' => 
  array (
    0 => 'app\\plugins\\expressforkdn\\Hook',
  ),
  'plugins_common_header' => 
  array (
    0 => 'app\\plugins\\expressforkdn\\Hook',
  ),
  'plugins_admin_common_header' => 
  array (
    0 => 'app\\plugins\\expressforkdn\\Hook',
  ),
  'plugins_service_order_handle_begin' => 
  array (
    0 => 'app\\plugins\\expressforkdn\\Hook',
  ),
  'plugins_service_system_begin' => 
  array (
  ),
  'plugins_view_header_navigation_top_left' => 
  array (
  ),
  'plugins_view_user_login_info_top' => 
  array (
  ),
  'plugins_view_user_sms_reg_info' => 
  array (
  ),
  'plugins_view_user_email_reg_info' => 
  array (
  ),
  'plugins_service_buy_handle' => 
  array (
    0 => 'app\\plugins\\freightfee\\Hook',
  ),
  'get_wx_code' =>
  array(
      0 => 'app\\plugins\\snsweixin\\Auth',
  ),
    'weixin_login' =>
        array(
            0 => 'app\\plugins\\snsweixin\\Auth',
        ),
    'weixin_jssdk_config'=>
        array(
            0 => 'app\\plugins\\snsweixin\\Auth',
        ),

);
?>