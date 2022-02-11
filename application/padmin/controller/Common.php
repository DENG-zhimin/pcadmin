<?php
namespace app\padmin\controller;

use think\Controller;
use think\Db;

/**
 * 官网后台系统 -
 * @author   YJ
 
 * @version  0.0.1
 * @datetime 2019-6-01T21:51:08+0800
 */
class Common extends Controller
{

    /**
     * 初始化
     * @author   Yj
     */

    public function __construct()
    {
        parent::__construct();
        //加载配置
      //  $this->getConfig();
      
      $this->Islogin();
			
	$this->CommonInit();
        
    }

    /**
     * 判断是否登录
     * @author   yj
     * @version 1.0.0
     * @date    2019-5-20
     * @desc    description
     */
    public function Islogin()
    {
        // 用户数据
        if(session('PAdmin') == null)
        {
            $referer_url = MyUrl('padmin/adminlogin/index');
            $this->redirect( $referer_url);
        }
    }
		
				
    /**
     * 公共钩子初始化
     * @author   yj
     * @version 1.0.0
     * @date    2019-5-20
     * @desc    description
     */
    private function CommonInit()
    {

        // 用户数据
        if(session('PAdmin') != null)
        {
            $PAdmin=session('PAdmin');//账号信息
            $this->assign('PAdmin', $PAdmin);//账号信息
        }

    }

    /**
     * 通过id跳转到对应模板
     * @author   yj
     * @version 1.0.0
     * @date    2019-5-20
     * @desc    description
     */
    public function JumpUrl($id)
    {
        // ID跳转
        if($id)
        {
            $filename=self::get_template($id);//id获取模板
            $referer_url = MyUrl('padmin/index/'.$filename,['id'=>$id]);
            $this->redirect( $referer_url);
        }
    }

    /**
     * 通过id获取模板
     * @author   yj
     * @version 1.0.0
     * @date    2019-5-20
     * @desc    description
     */
    public function get_template($id)
    {
        // ID跳转
        if($id)
        {
            $data_params = array(
                'field'     => 's.id , p.filename',
            );
            $field=$data_params['field'];
            $data = Db::name('WebsiteNav')->field($field)->alias('s')->join(['__WEBSITE_FORMWORK__' => 'p'], 's.formwork_id=p.id')->where('s.id',$id)->find();
            return $data['filename'];
        }
    }

    /**
     * 通过id获取顶级栏目ID
     * @author   yj
     * @version 1.0.0
     * @date    2019-5-20
     * @desc    description
     */
    public function get_nav_topid($id)
    {
        // ID跳转
        if($id)
        {
            $pid = Db::name('WebsiteNav')->where("id",$id)->column('pid');

            if($pid[0]>0){
                $topid=self::get_nav_topid($pid['0']);
            }else{
                $topid=$id;
            }
            return $topid;
        }
    }

    /**
     * 获取导航所有分类
     * @author   Yj
     */
    public function get_nav($pid=0)
    {
        $where = empty($pid) ? ['pid'=>0] : ['pid'=>$pid] ;
        $list = Db::name('WebsiteNav')->where($where)->select();
        if(!empty($list)){
            foreach($list as $k => $v){
                $list[$k]['child']= self::get_nav_son($v['id']);
            }
        }
        return $list;
    }

    /**
     * 获取导航下级分类
     * @author   Yj
     */
    public function get_nav_son($pid)
    {
        $where =  ['pid'=>$pid] ;
        $list = Db::name('WebsiteNav')->where($where)->select();
        if(!empty($list)){
            foreach($list as $k => $v){
                $list[$k]['child']= self::get_nav_son($v['id']);
            }
        }
        return $list;
    }

    /**
     * 获取导航同级分类
     * @author   Yj
     */
    public function get_nav_same($id)
    {
        $pid = Db::name('WebsiteNav')->where("id",$id)->column('pid');
        $where =  ['pid'=>$pid] ;
        $list = Db::name('WebsiteNav')->where($where)->select();
        return $list;
    }

    /**
     * 获取某分类单条广告图片
     * @author   Yj
     */
    public function get_img($id='1')
    {
        $img = Db::name('WebsiteImg')->where("cateid",$id)->find();
        return $img;
    }
    /**
     * 获取某分类广告图片列表
     * @author   Yj
     */
    public function get_img_list($id)
    {
        $img = Db::name('WebsiteImg')->where("cateid",$id)->select();
        return $img;
    }
    /**
     * 获取基本配置信息
     * @author   Yj
     */
    public function get_system($id='1')
    {
        $system = Db::name('WebsiteSystem')->where("id",$id)->find();
        $typedata=json_decode($system['typedata'],true);
        if(!empty($typedata)){
            foreach($typedata as $k =>$v){
                if($k=="online"){
                  //  $system[$k]=str_replace("amp;","",$v);
                    $system[$k]=htmlspecialchars_decode(trim($v));
                }else{
                    $system[$k]=$v;
                }

            }
        }
        return $system;
    }

    /**
     * 通过ID获取模板的字段
     * @author   Yj
     */
    public function get_formwork($id='')
    {
        $formwork = Db::name('WebsiteFormwork')->where('id', $id)->column('typedata');//模板的字段
        $data = json_decode($formwork[0], true);
        return $data;
    }

    /**
     * 通过ID获取导航列表的内容
     * @author   Yj
     */
    public function get_navlist($id='',$m=0,$n=10)
    {
        $navlist = Db::name('WebsiteNavlist')->where('nav_id',$id)->limit($m,$n)->order('add_time desc,displayorder desc')->select();//导航列表内容
        foreach ($navlist as $k=>$v) {
            $navlist[$k]['typedata'] = json_decode($v['typedata'],true);
        }
        return $navlist;
    }
    /**
     * 通过ID获取固定一条内容
     * @author   Yj
     */
    public function get_navlist_one($id='')
    {
        $data = Db::name('WebsiteNavlist')->where('id',$id)->find();//内容
        $data['typedata'] = json_decode($data['typedata'],true);
        return $data;
    }


    /**
     * 获取随机数
     * @author   Yj
     */
    public function GetRandStr($length)
    {
        $str='abcdefghijklmnopqrstuvwxyz0123456789';
        $len=strlen($str)-1;
        $randstr='';
        for($i=0;$i<$length;$i++){
            $num=mt_rand(0,$len);
            $randstr .= $str[$num];
        }
        return $randstr;
    }

		

}
?>

