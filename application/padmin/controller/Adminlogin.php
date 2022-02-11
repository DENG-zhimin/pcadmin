<?php
namespace app\padmin\controller;
use think\Db;
use think\Controller;

/**
 * 登录- 后台管理
 * @author   Deng Zhimin
 * @version  0.0.1
 * @datetime 2019-05-07T21:51:08+0800
 * todo:	1: data validation
 */
class Adminlogin extends Controller
{

    /**
     * [Index 登录]
     * @author   YJ

     * @version  0.0.1
     * @datetime 2019-5-06T21:31:53+0800
     */
    public function index()
    {
        // 用户数据
        if(session('PAdmin') != null)
        {
            $referer_url = MyUrl('/padmin/index/index');
              $this->redirect( $referer_url);
        }
        $title = '登录';
        $this->assign('title', $title);
        return $this->fetch('index/login');
    }
		
		
    //退出后台
    public function Logout()
    {
        session('PAdmin', null);
        $referer_url = MyUrl('/padmin');
        $this->redirect( $referer_url);

    }
		
		/**
     * [Index 登录操作]
     * @author   YJ

     * @version  0.0.1
     * @datetime 2019-5-06T21:31:53+0800
     */
    public function loginAction()
    {
        $data = input(); //return $data;
        if($data){
            //查询该管理员
            if($data['username']){
                $where[] = ['username', 'eq', $data['username']];//账号
                $admin=Db::name('Admin')->where($where)->find();
                //判断账号是否存在
                if($admin){
                    //账号状态
                    if($admin['status']=='1'){
                        return DataReturn("该账号已被禁用",-500);  //商家账号状态
                    }else{
                        //判断密码是否正确
                        $salt=$admin['salt'];//获取数据库salt
                        $pwd=$data['password'];//获取表单提交的密码
                        $password=md5($pwd.$salt);//MD5加密
                        //判断密码是否正确
                        if($password!=$admin['pwd']){
                            return DataReturn("密码错误",-500);  //商家密码错误
                        }else {
                            //验证成功后进行的操作
                            $arr['lastip'] = $_SERVER["REMOTE_ADDR"];//最后登录IP
                            $arr['lastvisit'] = time();//最后登录时间
                            Db::name('admin')->where('id', $admin['id'])->update($arr);

                            // 存储session
                            session('PAdmin', $admin);
                            return DataReturn("登入成功",200);
                        }
                    }

                }else{
                    return DataReturn("该账号不存在",-500);  //账号不存在或被禁用
                }
            }

        }

    }

    



}
?>