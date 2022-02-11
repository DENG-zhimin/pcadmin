<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------
namespace app\index\controller;

use app\service\UserService;
use app\service\NavigationService;

/**
 * 个人资料
 * @author   ONE
 
 * @version  0.0.1
 * @datetime 2017-03-02T22:48:35+0800
 */
class Personal extends Common
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
	 * [Index 首页]
	 * @author   ONE
	 
	 * @version  0.0.1
	 * @datetime 2017-02-22T16:50:32+0800
	 */
	public function Index()
	{
		$this->assign('personal_show_list', NavigationService::UsersPersonalShowFieldList());
		return $this->fetch();
	}

	/**
	 * [SaveInfo 编辑页面]
	 * @author   ONE
	 
	 * @version  0.0.1
	 * @datetime 2017-03-26T14:26:01+0800
	 */
	public function SaveInfo()
	{
		// 性别
		$this->assign('common_gender_list', lang('common_gender_list'));

		// 数据
		$this->assign('data', $this->user);

		return $this->fetch();
	}

	/**
	 * [Save 数据保存]
	 * @author   ONE
	 
	 * @version  0.0.1
	 * @datetime 2017-03-26T14:26:34+0800
	 */
	public function Save()
	{
		// 是否ajax请求
		if(!IS_AJAX)
		{
			$this->error('非法访问');
		}

		// 开始操作
		$params = input('post.');
        $params['user'] = $this->user;
        return UserService::PersonalSave($params);
	}
}
?>