<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------
namespace app\index\controller;

use app\service\BannerService;
use app\service\GoodsService;
use app\service\ArticleService;
use app\service\OrderService;

/**
 * 首页
 * @author   ONE

 * @version  0.0.1
 * @datetime 2016-12-01T21:51:08+0800
 */
class Index extends Common
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
     * 首页
     * @author   ONE

     * @version  1.0.0
     * @datetime 2018-12-02T11:11:49+0800
     */
    public function Index()
    {
        // 首页轮播
        $this->assign('banner_list', BannerService::Banner());

        // 楼层数据
        $this->assign('goods_floor_list', GoodsService::HomeFloorList());

        // 新闻
        $params = [
            'where' => ['a.is_enable'=>1, 'a.is_home_recommended'=>1],
            'field' => 'a.id,a.title,a.title_color,ac.name AS category_name',
            'm' => 0,
            'n' => 9,
        ];
        $article_list = ArticleService::ArticleList($params);
        $this->assign('article_list', $article_list['data']);

        // 用户订单状态
        $user_order_status = OrderService::OrderStatusStepTotal(['user_type'=>'user', 'user'=>$this->user, 'is_comments'=>1]);
        $this->assign('user_order_status', $user_order_status['data']);
        
        return $this->fetch();
    }
}
?>