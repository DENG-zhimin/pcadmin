<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------
namespace app\index\controller;

use app\service\CustomViewService;
use app\service\SeoService;

/**
 * 自定义页面
 * @author   ONE

 * @version  0.0.1
 * @datetime 2016-12-01T21:51:08+0800
 */
class CustomView extends Common
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
     * [Index 文章详情]
     * @author   ONE

     * @version  0.0.1
     * @datetime 2016-12-06T21:31:53+0800
     */
	public function Index()
	{
		// 获取页面
		$id = input('id');
		$params = [
			'where' => ['is_enable'=>1, 'id'=>$id],
			'field' => 'id,title,content,is_header,is_footer,is_full_screen,access_count',
			'm' => 0,
			'n' => 1,
		];
		$data = CustomViewService::CustomViewList($params);
		if(!empty($data['data'][0]))
		{
			// 访问统计
			CustomViewService::CustomViewAccessCountInc(['id'=>$id]);

			// 浏览器标题
			$this->assign('home_seo_site_title', SeoService::BrowserSeoTitle($data['data'][0]['title']));

			$this->assign('data', $data['data'][0]);
            $this->assign('is_header', $data['data'][0]['is_header']);
            $this->assign('is_footer', $data['data'][0]['is_footer']);
			return $this->fetch();
		} else {
			$this->assign('msg', '页面不存在或已删除');
			return $this->fetch('public/tips_error');
		}
	}
}
?>