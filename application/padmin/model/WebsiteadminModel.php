<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.sscrm.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: YJ
// +----------------------------------------------------------------------
namespace app\padmin\model;
use think\Db;
use think\Model;
/**
 * 后台管理员服务层
 * @author   YJ

 * @version  0.0.1
 * @datetime 2019-06-11T21:51:08+0800
 */
class WebsiteadminModel extends Model
{

    /**
     * 获取管理员分页列表
     * @author   YJ
     * @version 1.0.0
     * @date    2019-06-11
     */
    public static function WebsiteadminPageList($params = [])
    {
        $res = [
            'code' => 1,
            'msg' => '数据加载失败',
        ];

        // 获取列表字段
        /*$data_params = array(
            'field'     => 's.* , p.title as ptitle',
        );
        $field=$data_params['field'];*/
        //分页
          $size = isset($params['limit']) ? $params['limit'] : 10;
          $page = isset($params['page']) ? ($params['page']-1) * $size : 0;

        //分页数据
        // $data = Db::name('admin')->field($field)->alias('s')->join(['__WEBSITE_IMG_CATEGORY__' => 'p'], 's.cateid=p.id')->limit($page,$size)->select();
        $data = Db::name('admin')->limit($page,$size)->select();

        if (!empty($data))
        {
            $res['code'] = 0;
            $res['msg'] = '加载成功';
            //总条数
            $res['count'] = Db::name('admin')->count();
            $res['data'] = $data;
        }
        else
        {
            $res['msg'] = '没有数据';
        }
        return $res;

    }
    /**
     * 添加
     * @author   YJ
     * @version 1.0.0
     * @date    2019-05-12
     * @desc    description
     */
    public static function WebsiteadminAdd($params = [])
    {
        // 参数校验
        $p = [
            [
                'checked_type'      => 'empty',
                'key_name'          => 'username',
                'error_msg'         => '用户名不能为空',
            ],
            [
                'checked_type'      => 'empty',
                'key_name'          => 'pwd',
                'error_msg'         => '密码不能为空',
            ],
        ];
        $ret = ParamsChecked($params, $p);
        if($ret !== true)
        {
            return DataReturn($ret, -1);
        }

        $data = [
            'username'           =>  trim($params['username']),
            'salt'               =>  trim($params['salt']),
            'pwd'                =>  trim($params['pwd']),
            'roleid'             =>  1,//默认1保留字段，不做功能
            'perms'              =>  1,//默认1保留字段，不做功能
            'status'             =>  isset($params['status']) ? trim($params['status']) : 0,
            'lastvisit'          =>  time(),
        ];

        if (Db::name('admin')->insertGetId($data) > 0)
        {
            return DataReturn('添加成功');
        }

        return DataReturn('添加失败',-2);
    }

    /**
     * 修改
     * @author   yj
     * @version 1.0.0
     * @date    2019-06-12
     * @desc    description
     */
    public static function adminEdit($params = [])
    {
        // 参数校验
        $p = [
            [
                'checked_type'      => 'empty',
                'key_name'          => 'id',
                'error_msg'         => 'ID不能为空',
            ],
            [
                'checked_type'      => 'empty',
                'key_name'          => 'username',
                'error_msg'         => '用户名不能为空',
            ],
            [
                'checked_type'      => 'empty',
                'key_name'          => 'pwd',
                'error_msg'         => '密码不能为空',
            ],
        ];
        $ret = ParamsChecked($params, $p);
        if($ret !== true)
        {
            return DataReturn($ret, -1);
        }

        $data = [
            'username'           =>  trim($params['username']),
            'salt'               =>  trim($params['salt']),
            'pwd'                =>  trim($params['pwd']),
            'roleid'             =>  1,//默认1保留字段，不做功能
            'perms'              =>  1,//默认1保留字段，不做功能
            'status'             =>  isset($params['status']) ? trim($params['status']) : 0,
            'lastvisit'          =>  time(),
        ];

        
        if (Db::name('admin')->where('id = '.$params['id'])->update($data) !== false)
        {
            return DataReturn('修改成功');
        }

        return DataReturn('修改失败',-2);

    }


    /**
     * 删除
     * @author   yj
     * @version 1.0.0
     * @date    2019-06-12
     * @desc    description
     */
    public static function adminDel($id = null)
    {
        if ($id)
        {
            if (Db::name('admin')->where('id = '.$id)->delete())
            {
                return DataReturn('删除成功');
            }
        }

        return DataReturn('删除失败',-4);
    }

    /**
     * 状态修改
     * @author   yj
     * @version 1.0.0
     * @date    2019-06-12
     * @desc    description
     */
    public static function adminEditStatus($params = [])
    {
        if (!isset($params['id']) && empty($params['id']))
        {
            return DataReturn('ID不能为空');
        }
        else
        {
            $id = intval($params['id']);
        }

        /*$data = [
            '$params[type]'    =>  intval($params['value'])
        ];*/
        $type=$params['type'];
        $data[$type] = intval($params['value']);//要修改的值

        if (Db::name('admin')->where('id = '.$id)->update($data) !== false)
        {
            return DataReturn('修改成功');
        }

        return DataReturn('修改失败',-4);
    }

}
?>