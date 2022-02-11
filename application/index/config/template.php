<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------

/**
 * 模板设置
 * @author   ONE

 * @version  0.0.1
 * @datetime 2016-12-01T21:51:08+0800
 */
return [
    // 模板引擎类型 支持 php think 支持扩展
    'type'         => 'Think',
    // 默认模板渲染规则 1 解析为小写+下划线 2 全部转换小写 3 保持操作方法
    'auto_rule'    => 1,
    // 模板路径
    'view_path'    => APP_PATH.'index'.DS.'view'.DS.strtolower(MyC('common_default_theme', 'default', true)).DS,
    // 模板后缀
    'view_suffix'  => 'html',
    // 模板文件名分隔符
    'view_depr'    => DIRECTORY_SEPARATOR,
    // 模板引擎普通标签开始标记
    'tpl_begin'    => '{{',
    // 模板引擎普通标签结束标记
    'tpl_end'      => '}}',
    // 标签库标签开始标记
    'taglib_begin' => '{{',
    // 标签库标签结束标记
    'taglib_end'   => '}}',
];
?>