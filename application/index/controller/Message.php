<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------
namespace app\index\controller;

use app\service\MessageService;

/**
 * 消息管理
 * @author   ONE
 
 * @version  0.0.1
 * @datetime 2016-12-01T21:51:08+0800
 */
class Message extends Common
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

        // 是否登录
        $this->IsLogin();
    }

    /**
     * 消息列表
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

        // 消息更新未已读
        MessageService::MessageRead($params);

        // 分页
        $number = 10;

        // 条件
        $where = MessageService::MessageListWhere($params);

        // 获取总数
        $total = MessageService::MessageTotal($where);

        // 分页
        $page_params = array(
                'number'    =>  $number,
                'total'     =>  $total,
                'where'     =>  $params,
                'page'      =>  isset($params['page']) ? intval($params['page']) : 1,
                'url'       =>  MyUrl('index/message/index'),
            );
        $page = new \base\Page($page_params);
        $this->assign('page_html', $page->GetPageHtml());

        // 获取列表
        $data_params = array(
            'm'         => $page->GetPageStarNumber(),
            'n'         => $number,
            'where'     => $where,
        );
        $data = MessageService::MessageList($data_params);
        $this->assign('data_list', $data['data']);

        // 业务类型
        $this->assign('common_business_type_list', lang('common_business_type_list'));

        // 消息类型
        $this->assign('common_message_type_list', lang('common_message_type_list'));

        // 是否已读
        $this->assign('common_is_read_list', lang('common_is_read_list'));

        // 参数
        $this->assign('params', $params);
        return $this->fetch();
    }

}
?>