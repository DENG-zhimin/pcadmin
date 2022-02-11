<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------
namespace app\index\controller;

use app\service\AnswerService;

/**
 * 问答/留言管理
 * @author   ONE
 
 * @version  0.0.1
 * @datetime 2016-12-01T21:51:08+0800
 */
class Answer extends Common
{
    /**
     * [_initialize 前置操作-继承公共前置方法]
     * @author   ONE
     
     * @version  0.0.1
     * @datetime 2016-12-03T12:39:08+0800
     */
    public function _initialize()
    {
        // 调用父类前置方法
        parent::_initialize();

        // 是否登录
        $this->IsLogin();
    }

    /**
     * 问答/留言列表
     * @author   ONE
    * @version 1.0.0
     * @date    2018-09-28
     * @desc    description
     */
    public function Index()
    {
        // 参数
        $params = input();
        $params['user'] = $this->user;

        // 分页
        $number = 10;

        // 条件
        $where = AnswerService::AnswerListWhere($params);

        // 获取总数
        $total = AnswerService::AnswerTotal($where);

        // 分页
        $page_params = array(
                'number'    =>  $number,
                'total'     =>  $total,
                'where'     =>  $params,
                'page'      =>  isset($params['page']) ? intval($params['page']) : 1,
                'url'       =>  MyUrl('admin/answer/index'),
            );
        $page = new \base\Page($page_params);
        $this->assign('page_html', $page->GetPageHtml());

        // 获取列表
        $data_params = array(
            'm'         => $page->GetPageStarNumber(),
            'n'         => $number,
            'where'     => $where,
        );
        $data = AnswerService::AnswerList($data_params);
        $this->assign('data_list', $data['data']);

        // 状态
        $this->assign('common_is_show_list', lang('common_is_show_list'));

        // 是否
        $this->assign('common_is_text_list', lang('common_is_text_list'));

        // 参数
        $this->assign('params', $params);
        return $this->fetch();
    }

}
?>