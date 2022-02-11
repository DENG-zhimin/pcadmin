<?php

//菜单数据

$menu = [
    [
        'title'		=> "基本信息",
        'module'	=> 'ss_estate',
        'controller'=> 'admin',
        'action'	=> 'index',
        'subMenu'	=>[
            [
                'title'		=> "社区管理",
                'module'	=> 'ss_estate',
                'controller'=> 'project',
                'action'	=> 'index',
                'icon'		=> 'am-icon-users'
            ],
            [
                'title'		=> "楼栋管理",
                'module'	=> 'ss_estate',
                'controller'=> 'building',
                'action'	=> 'index',
                'icon'		=> 'am-icon-building'
            ],
            [
                'title'		=> "房间管理",
                'module'	=> 'ss_estate',
                'controller'=> 'room',
                'action'	=> 'index',
                'icon'		=> 'am-icon-home'
            ],
        ]
    ],
    [
        'title'		=> "住户管理",
        'module'	=> 'ss_estate',
        'controller'=> 'user',
        'action'	=> 'index',
        'subMenu'	=>[
            [
                'title'		=> "业主管理",
                'module'	=> 'ss_estate',
                'controller'=> 'host',
                'action'	=> 'index',
                'icon'		=> 'am-icon-user-plus'
            ],
//			[
//			'title'		=> "租户管理",
//			'module'	=> 'ss_estate',
//			'controller'=> 'tenant',
//			'action'	=> 'index',
//			'icon'		=> 'am-icon-user'
//			],
            [
                'title'		=> "钥匙审核",
                'module'	=> 'ss_estate',
                'controller'=> 'keymgmt',
                'action'	=> 'index',
                'icon'		=> 'am-icon-key'
            ],
            [
                'title'		=> "门卡管理",
                'module'	=> 'ss_estate',
                'controller'=> 'doorkey',
                'action'	=> 'index',
                'icon'		=> 'am-icon-credit-card'
            ],
        ]
    ],
    [
        'title'		=> "社区安防",
        'module'	=> 'ss_estate',
        'controller'=> 'safeguard',
        'action'	=> 'index',
        'subMenu'	=>[
            [
                'title'		=> "门禁设备管理",
                'module'	=> 'ss_estate',
                'controller'=> 'gate',
                'action'	=> 'index',
                'icon'		=> 'am-icon-lock'
            ],
            [
                'title'		=> "物业机设备管理",
                'module'	=> 'ss_estate',
                'controller'=> 'mgmtdevice',
                'action'	=> 'index',
                'icon'		=> 'am-icon-television'
            ],
            [
                'title'		=> "开门记录",
                'module'	=> 'ss_estate',
                'controller'=> 'doorlog',
                'action'	=> 'index',
                'icon'		=> 'am-icon-book'
            ],
            [
                'title'		=> "访客留影",
                'module'	=> 'ss_estate',
                'controller'=> 'visitmsg',
                'action'	=> 'index',
                'icon'		=> 'am-icon-video-camera'
            ],
        ]
    ],
    [
        'title'		=> "运营管理",
        'module'	=> 'ss_estate',
        'controller'=> 'management',
        'action'	=> 'index',
        'subMenu'	=>[
            [
                'title'		=> "公司管理",
                'module'	=> 'ss_estate',
                'controller'=> 'company',
                'action'	=> 'index',
                'icon'		=> 'am-icon-home'
            ],
            [
                'title'		=> "收费管理",
                'module'	=> 'ss_estate',
                'controller'=> 'company',
                'action'	=> 'listinvoice',
                'icon'		=> 'am-icon-area-chart'
            ],
            [
                'title'		=> "广告管理",
                'module'	=> 'ss_estate',
                'controller'=> 'advertisement',
                'action'	=> 'index',
                'icon'		=> 'am-icon-image'
            ],
//			[
//			'title'		=> "社区公告",
//			'module'	=> 'ss_estate',
//			'controller'=> 'bulletin',
//			'action'	=> 'index',
//			'icon'		=> 'am-icon-bullhorn'
//			],
            [
                'title'		=> "投诉管理",
                'module'	=> 'ss_estate',
                'controller'=> 'complaint',
                'action'	=> 'index',
                'icon'		=> 'am-icon-paper-plane'
            ]
        ]
    ],

    [
        'title'		=> "权限管理",
        'module'	=> 'ss_estate',
        'controller'=> 'auth',
        'action'	=> 'index',
        'subMenu'	=>[
            [
                'title'		=> "管理员权限组",
                'module'	=> 'ss_estate',
                'controller'=> 'auth',
                'action'	=> 'groupAccess',
                'icon'		=> 'am-icon-home'
            ],
            [
                'title'		=> "权限列表",
                'module'	=> 'ss_estate',
                'controller'=> 'auth',
                'action'	=> 'rule',
                'icon'		=> 'am-icon-home'
            ],
            [
                'title'		=> "权限组",
                'module'	=> 'ss_estate',
                'controller'=> 'auth',
                'action'	=> 'group',
                'icon'		=> 'am-icon-home'
            ],


        ]
    ]
];
?>