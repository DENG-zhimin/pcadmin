<?php
namespace app\padmin\controller;

use think\Controller;
use think\Db;
use app\padmin\model\WebsiteadminModel;

use app\padmin\validate\Staff as StaffVali;
use  app\padmin\model\Staff as StaffModel;
use  app\padmin\model\Computer as CompModel;
use app\padmin\model\Software as SoftwareModel;
use app\padmin\model\ComputerSoftware as CompSoftModel;
use  app\padmin\model\Printer as PrinterModel;
use app\padmin\model\Maintain as MaintainModel;

/**
 *  后台管理
 * @author   YJ
 
 * @version  0.0.1
 * @datetime 2019-6-01T21:51:08+0800
 */
class Index extends Common
{

    /**
     * 构造方法
     * @author   YJ
     * @version 1.0.0
     * @date    2019-5-20
     */
 public function __construct()
 {
     parent::__construct();

 }



    // 后台管理入口
    public function index($params = [])
    {
        // 数组组装  
        $this->assign('data', ['hello', 'world!']);
        $this->assign('msg', 'hello world! admin');
        //dump(request()->action());
        return $this->fetch('');
    }

    //maintain
    public function maintain()
    {
        return $this->fetch();
    }

    public  function getMaintainList()
    {
        $params=input('get.');
        $params = \wherify_params($params);
        
        $pageParams = array();
        // $pageParams['list_rows'] = 100;
        if(isset($params['page'])) {$pageParams['page'] =$params['page'] ; unset($params['page']);}
        if(isset($params['limit'])) {$pageParams['list_rows']=$params['limit']; unset($params['limit']);}

        $whereor = array();
        if(isset($params['keyword'])){
            $kw=$params['keyword'];
            $whereor[] = ['c.FQDN', 'like', "%$kw%"];
            $whereor[] = ['m.app_time', 'like', "%$kw%"];
            $whereor[] = ['m.maintain_time', 'like', "%$kw%"];
            $whereor[] = ['m.applicant', 'like', "%$kw%"];
        }

        $list = Db::name('maintain')->alias('m')
            ->order('app_time desc')
            ->leftjoin('department d', 'd.id=m.department_id')
            ->leftjoin('computer c', 'c.id=m.computer_id')
            ->whereor($whereor)
            ->field('m.*,d.name as department, c.FQDN as computer')
            ->paginate($pageParams)->toArray();
        return \LayuiDataReturn('ok', 200, $list['data'], $list['total']);
    }

    public function maintainInfo()
    {
        $params=input('get.');
        $this->assign([
            'id'=>$params['id']
            ,'department_id'=>$params['department_id']
            ]);

        return $this->fetch();
    }

    public function saveMaintainInfo()
    {
        $params = input('post.');
        return MaintainModel::saveMaintain($params);
    }
    
    public function getMaintainInfo()
    {
        $params = input('get.');

        $info = Db::name('maintain')
        ->where('id',$params['id'])
        ->find();
        
        return \DataReturn('ok',200,$info);

    }


    
    //console
    public function panel()
    {
        dump('console is here');
        return $this->fetch();
    }

    public function staff()    
    {

        return $this->fetch();
    }

    public function listStaff()
    {
        $params = input('get.');
        $page = isset($params['page'])?$params['page']:1;
        $limit = isset($params['limit'])?$params['limit']:10;
        $pagi=[
            'page' => $page,
            'list_rows' => $limit,
        ];
        $where = array();
        if(isset($params['keyword'])) {
            $kw = $params['keyword'];
            $whereor[] = ['s.name', 'like', "%$kw%"];
            $whereor[] = ['s.mobile', 'like', "%$kw%"];
            $whereor[] = ['s.email', 'like', "%$kw%"];
            $whereor[] = ['s.email2', 'like', "%$kw%"];
            $whereor[] = ['s.staff_number', 'like', "%$kw%"];
            $whereor[] = ['s.extension', 'like', "%$kw%"];
            $whereor[] = ['s.short_number', 'like', "%$kw%"];
            $whereor[] = ['d.name', 'like', "%$kw%"];
        }
        $staffData = Db::name('staff')->alias('s')
            ->leftjoin('department d','d.id=s.department_id')
            ->whereor($whereor)
            ->field('s.*, d.name as department')
            ->order('department_id')
            ->paginate($pagi)->toArray();

        return LayuiDataReturn('OK', 200, $staffData['data'], $staffData['total']);
    }

    //获取部门员工
    public function getDptStaff()
    {
        $params = input('get.');
        
        if(!isset($params['dptId'])) return DataReturn('未指定参数',201);
        $staff = Db::name('staff')->where('department_id',$params['dptId'])->select();

        return DataReturn('ok',200,$staff);
    }

    //打开员工信息模板
    public function staffInfo()
    {
        $params = input('get.');
        $staffId = isset($params['id'])?$params['id']:0;
        
        $this->assign('staffId', $staffId);
        return $this->fetch('staffInfo');
    }

    public function getStaffInfo()
    {
        $params = input('get.');
        
        if(!isset($params['id'])) return DataReturn('参数不足',301);
        $staff = Db::name('staff')->where('id',$params['id'])->find();

        return DataReturn('OK',200,$staff);
    }

    public function saveStaffInfo()
    {
        $data = input('post.');
        $staff = new StaffModel;

        return $staff->saveStaff($data);
    }

    public function delStaff()
    {
        $data=input('post.');
        $staff = new StaffModel;
        return $staff->delStaff([$data['id']]);
    }

    //department
    public function department()
    {
        return $this->fetch();
    }

    public function loaddptlist()
    {

        $params=input('get.');

		isset($params['page'])?  $page = $params['page']:$page=1;
        isset($params['limit'])?  $limit = $params['limit']:$limit=100;
        $pageParams=[
            'page' => $page,
            'list_rows'=>$limit,
        ];
		
		// $where=1;
        $dpt=Db::name('department')->paginate($pageParams)->toArray();
        
        return LayuiDataReturn('good',200,$dpt['data'],$dpt['total']);

    }

    public function dptsaveinfo()
    {
        return $this->fetch();
    }

    public function dptSave()
    {
        $data = input('post.');
        $msg = '操作失败';
        //检测名称
        $exist = Db::name('department')->where('name',$data['name'])->find();
        if($exist) return DataReturn('名称冲突,请选择其他名称', 301);
        
        if($data['id']=='')
        {
            //新增部门
            $dptRes = Db::name('department')->insert(['name'=>$data['name']]);
            if($dptRes) $msg='新增部门成功';
        } else {
            //修改部门
            $dptRes = Db::name('department')->where('id',$data['id'])->update(['name'=>$data['name']]);
            if($dptRes) $msg='修改部门成功';
        }
        return DataReturn($msg,200);
    }

    public function dptDel()
    {
        $data=input('post.');
        $msg = '操作失败';
        //检测是否还有数据
        $hasStaff = Db::name('staff')->where('department_id',$data['id'])->find();
        $hasComputer = Db::name('computer')->where('department_id',$data['id'])->find();
        if($hasStaff + $hasComputer > 0) return DataReturn('该部门还有关联用户或电脑,无法删除',301);
        $delRes = Db::name('department')->where('id',$data['id'])->delete();
        if($delRes) $msg='删除成功';

        return DataReturn($msg,200);
    }

    //电脑列表页面
    public function computer()
    {
        $access = Db::name('internet_access')->where('disabled',0)->select();
        $this->assign('internetAccess',$access);
        return $this->fetch();
    }

    //电脑信息详情页面
    public function computerInfo()
    {
        $data = input('get.');
        
        $compId = isset($data['id'])?$data['id']:0;
        $this->assign('computerId',$compId);
        $dptId = isset($data['departmentId'])?$data['departmentId']:0;
        $this->assign('departmentId',$dptId);
        return $this->fetch();
    }

    //获取电脑详情
    public function getCompInfo()
    {
        $data = input('get.');
        $compId = isset($data['id'])?$data['id']:0;
        $comp = Db::name('computer')->where('id',$compId)->find();

        return DataReturn('ok',200,$comp);
    }
    
    //保存电脑信息
    public function saveComputerInfo()
    {
        $params = input('post.');
        $comp = new CompModel; 
        return $comp->saveInfo($params);
    }

    //delete computer
    public function delComputer()
    {
        $params=input('post.');
        return CompModel::delComputer($params);
    }
    //获取OS列表
    public function getOsList()
    {
        $order = ['name','version'];
        $os = Db::name('os')->order($order)->select( );
        $osData = array();
        if($os)
        {
            foreach($os as $v)
            {
                $o['id'] = $v['id'];
                $o['name'] = $v['name'] . '_' . $v['version'] . '_' . $v['arch'];
                $osData[] = $o;
            }
        }

        return DataReturn('ok',200,$osData);

    }

    // get computer list with detailed info and pagination
    public function getCompList()
    {
        $data=input('get.');
        $comp = new CompModel;
        return $comp->getCompList($data);
    }

    // get computer soft details
    public function computerSoft()
    {
        $params = input('get.');
        $computer = Db::name('computer')->alias('c')
            ->leftjoin('os os','os.id=c.os_id')
            ->where('c.id',$params['computerId'])
            ->field('c.*,os.name as os_name, os.version, os.arch')
            ->find();
        $this->assign('computer',$computer);

        $softwares = Db::name('software')->order(['name','version'])->select();
        $category = Db::name('software_category')->select();

        for($i=0; $i<count($category); $i++)
        {
            foreach($softwares as $v)
            {
                if($v['category_id']==$category[$i]['id'])
                {
                    $category[$i]['soft'][] = $v;
                }
            }
        }
        
        // dump($category);
        $this->assign('category', $category);
        
        return $this->fetch();
    }



    //save computer software mapping
    public function saveComputerSoftware()
    {
        $params = input('post.');
        return CompSoftModel::updateComputerSoftware($params);
    }

    // get computer software mapping
    public function getCompSoftMap()
    {
        $params = input('get.');
        if(!isset($params['id'])) return DataReturn('参数错误',201);

        $data = array();
        $map = Db::name('computerSoftware')->where('computer_id',$params['id'])->select();
        if(!empty($map))
        {
            foreach($map as $v)
            {
                $data[] = $v['software_id'];
            }
        }

        return DataReturn('ok',200,$data);
    }

    //updateComputerInternetAccess
    public function updateComputerInternetAccess()
    {
        $params = input('post.');
        return CompModel::updateComputerInternetAccess($params);
    }

    //get software template
    public function software()
    {
        return $this->fetch();
    }

    //get software list
    public function getSoftwareList()
    {
        $params=input('get.');
        $where = array();
        if(isset($params['catId'])){
            $where[] =[ 's.category_id' => $params['catId']];
        }

        $whereor = array();
        if(isset($params['keyword'])){
            $kw = $params['keyword'];
            $whereor[]=[ 's.name', 'like' , "%$kw%"];
            $whereor[]= ['c.chinese_name' ,  'like', "%$kw%"];
        }

        $pageParams = array();
        // $pageParams['list_rows'] = 100;
        if(isset($params['page'])) $pageParams['page'] =$params['page'];
        if(isset($params['limit'])) $pageParams['list_rows']=$params['limit'];

        if(empty($pageParams)){
            $data = Db::name('software')->alias('s')
                ->leftjoin('software_category c', 's.category_id = c.id')
                ->where($where)
                ->whereor($whereor)
                ->field('s.*,c.chinese_name as category')
                ->order(['c.id','s.name','s.version'])
                ->select();
            $soft['data'] = $data;
            $soft['total'] = count($data);
        } else {
            $soft = Db::name('software')->alias('s')
            ->leftjoin('software_category c', 's.category_id = c.id')
            ->where($where)
            ->whereor($whereor)
            ->order(['c.id','s.name','s.version'])
            ->field('s.*,c.chinese_name as category')
            ->paginate($pageParams)->toArray();
        }
        

        return LayuiDataReturn('ok',200,$soft['data'],$soft['total']);
    }

    //get software info template
    public function softwareInfo()
    {
        $params = input('get.');
        $id = isset($params['id'])?$params['id']:0;
        $this->assign('id',$id);
        return $this->fetch();
    }

    //get software info
    public function getSoftwareInfo()
    {
        $params = input('get.');
        if(!isset($params['id'])) return DataReturn('参数不足',201);
        $info = Db::name('software')->where('id',$params['id'])->find();
        return DataReturn('ok',200,$info);
    }

    //get software Category list
    public function getSoftwareCategory()
    {
        $cate = Db::name('software_category')->select();
        return DataReturn('ok',200,$cate);
    }

    //save software info
    public function saveSoftware()
    {
        $params = input('post.');
        return SoftwareModel::saveSoftware($params);
    }

    //del software
    public function delSoftware()
    {
        $params = input('post.');
        return SoftwareModel::delSoftware(array($params['id']));
    }


    //printer start

    //get printer template
    public function printer()
    {
        return $this->fetch();
    }

    //get software list
    public function getPrinterList()
    {
        $params=input('get.');
        $params = wherify_params($params);
        
        $pageParams = array();
        // $pageParams['list_rows'] = 100;
        if(isset($params['page'])) {$pageParams['page'] =$params['page'] ; unset($params['page']);}
        if(isset($params['limit'])) {$pageParams['list_rows']=$params['limit']; unset($params['limit']);}
        
        $where = array();
        if(!empty($params))
        {
            foreach($params as $k=>$v)
            {
                $where['p.'.$k] = $v;
            }
        }
        if(empty($pageParams)){
            $data = Db::name('printer')->alias('p')
                ->leftjoin('department d', 'd.id=p.department_id')
                ->where($where)
                ->field('p.*,d.name as department')
                ->select();
            $soft['data'] = $data;
            $soft['total'] = count($data);
        } else {
            $soft = Db::name('printer')->alias('p')
                ->leftjoin('department d', 'd.id=p.department_id')
                ->where($where)
                ->field('p.*,d.name as department')
                ->paginate($pageParams)->toArray();
        }
        

        return LayuiDataReturn('ok',200,$soft['data'],$soft['total']);
    }

    //get software info template
    public function printerInfo()
    {
        $params = input('get.');
        $params = \wherify_params($params);
        $this->assign($params);
        if(!in_array($params['department_id'],[0,""] ))
        {
            $staffs = Db::name('staff')->where('department_id',$params['department_id'])->field('id,name')->select();
            $computers = Db::name('computer')->where('department_id',$params['department_id'])->field('id,FQDN')->select();
            $this->assign([
                'staffs' => $staffs,
                'computers' => $computers
                ]);
        }
        return $this->fetch();
    }

    //get software info
    public function getPrinterInfo()
    {
        $params = input('get.');
        if(!isset($params['id'])) return DataReturn('参数不足',201);
        $params = \wherify_params($params);
        $info = Db::name('printer')->where($params)->select();
        return DataReturn('ok',200,$info);
    }


    //save software info
    public function savePrinter()
    {
        $params = input('post.');
        return PrinterModel::savePrinter($params);
    }

    //del software
    public function delPrinter()
    {
        $params = input('post.');
        return PrinterModel::delPrinter(array($params['id']));
    }



    //below old content



    /**
     * [Index 系统设置-编辑窗口]
     * @author   YJ
     */
    public function siteConfig()
    {
    	if(request()->isPost()){
    		 // 是否ajax
        if(!IS_AJAX)
        {
            return $this->error('非法访问');
        }
        // 开始操作
        $params = input('post.');
       // $params['online']=str_replace("amp;","",$params['online']);
        $params['online']=htmlspecialchars_decode(trim($params['online']));
        //区分添加或修改
        if (isset($params['id']) && !empty($params['id'])) {
            return WebsitesystemModel::WebsiteSystemEdit($params);
        }
    	} else {
				
//				$list = Db::name('srvVpsPlans')->where('cate_id',1)->select();
//				foreach($list as $v){
//					unset($v['id']);
//					$v['cate_id']=4;
//					$v['title'] = '国贸专用服务器';
//					Db::name('srvVpsPlans')->insert($v);
//				}
				
//				die('ok');
        $system= Db::name("WebsiteSystem")->where('id',1)->find();
        $list =json_decode($system['typedata'],true);
        foreach ($list as $k =>$v){
            $systemlist[$k]=trim($v);
        }
        $this->assign('system', $systemlist);
        return $this->fetch('siteConfig');
			}
    }

		public function ticket()
		{
			$status = [
				 0=>'待回复/pending'
				,3=>'开放'
				,5=>'已回复'
				,6=>'已关闭'
			];

		$status = json_encode($status);
		$this->assign('status',$status);
			return $this->fetch();
		}
		
		public function ticketDetail($id)
		{
			$this->assign('id',$id);
			return $this->fetch('ticketdetail');
		}

    // 后台管理员列表
    public function websiteAdmin($params = [])
    {
        if(in_array(session('PAdmin.username'), ['admin', 'it02']) ){
            $title = '管理员列表管理';
            $this->assign('title', $title);
            return $this->fetch('websiteadmin');
        } else {
            $this->redirect(MyUrl('padmin/index/computer'));
        }
    }
    //加载管理员列表
    public function websiteadminLoadInfo($params = [])
    {
        $params = input();
        return WebsiteadminModel::WebsiteadminPageList($params);

    }

    /**
     * [Index 管理员列表-添加与编辑窗口]
     * @author   YJ
     */
    public function websiteadminSaveInfo()
    {
        return $this->fetch('websiteadmin_save_info');
    }

    /**
     * [Save 管理员添加/编辑]
     * @author   YJ
     */
    public function websiteadminSave()
    {
        // 是否ajax
        if(!IS_AJAX)
        {
            return $this->error('非法访问');
        }

        // 开始操作
        $params = input('post.');
        $admin = Db::name('admin')->where("username", $params['username'])->find();

        //判断用户名是否存在
        if ($admin['id'] && $admin['id']!=$params['id']){
            return DataReturn("该用户名已存在", -5);  //已存在
        }
        //判断是否修改密码
        if($params['pwds']){
            $salt = $this->GetRandStr(6);
            $params['salt'] = $salt;//
            $params['pwd'] = md5($params['pwds'] . $salt);//密码
        }else{
            $admin = Db::name('admin')->where("id", $params['id'])->find();
            $params['salt'] = $admin['salt'];//
            $params['pwd'] =  $admin['pwd'];//密码
        }
        //区分添加或修改
        if (isset($params['id']) && !empty($params['id']))
        {

            return WebsiteadminModel::adminEdit($params);
        }
        else
        {
            return WebsiteadminModel::WebsiteadminAdd($params);
        }

    }

    /**
     * [Delete 管理员删除]
     * @author   YJ
     */
    public function websiteadminDel()
    {

        $id = !empty(input('id')) ? intval(input('id')) : 0;

        if ($id > 0)
        {
            return WebsiteadminModel::adminDel($id);
        }

        return DataReturn('无法删除',-5);
    }

    /**
     * [status 管理员状态]
     * @author   YJ
     */
    public function websiteadminStatus()
    {
        // 是否ajax
        if(!IS_AJAX)
        {
            return $this->error('非法访问');
        }

        // 开始操作
        $params = input('post.');
        return WebsiteadminModel::adminEditStatus($params);
    }

    // 后台留言列表
    public function websitemessage($params = [])
    {

        $title = '留言列表管理';
        $this->assign('title', $title);
        return $this->fetch('websitemessage');

    }
    //加载留言列表
    public function websitemessageLoadInfo($params = [])
    {
        $params = input();
        return WebsitemessageModel::WebsitemessagePageList($params);

    }
    /**
     * [Delete 留言删除]
     * @author   YJ
     */
    public function websitemessageDel()
    {

        $id = !empty(input('id')) ? intval(input('id')) : 0;

        if ($id > 0)
        {
            return WebsitemessageModel::WebsitemessageDel($id);
        }

        return DataReturn('无法删除',-5);
    }



    /*
   * 上传图片
   */
    public function upstate()
    {
        $files = $_FILES['file'];
        $path ='static/upload/images/padmin/'.date('Y').'/'.date('m').'/'.date('d');
        return UploadService::uploadImg($files,$path);
    }

    /*
   * 上传视频
   */
    public function uploadVideo()
    {
        $files = $_FILES['file'];
        return UploadModel::uploadFileQiniu($files);
    }

    /*
    * 上传编辑器图片
    */
    public function upedit()
    {
        $files = $_FILES['file'];
        $path ='./public/static/upload/images/plugins_xinxin_merch/'.date('Y').'/'.date('m').'/'.date('d');
        $list = UploadModel::uploadImg($files,$path);
        $arr['code']=$list['code'];
        $arr['msg']="";
        $arr['data']['src']=$list['data'];
        return $arr;
    }

}
?>