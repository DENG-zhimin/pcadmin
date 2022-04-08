<?php 
namespace app\padmin\model;

use app\padmin\validate\Computer as CompVali;
use think\Model;
use think\Db;


class Computer extends Model
{
  /**
   * 状态获取器
   */
  public function getStatusAttr($value)
  {
    $status = [1=>"使用中", 0=>"闲置", -1=>"已报废"];
    return $status[$value];
  }

    public static function getCompList($data)
    {
        $pageParams['page'] = isset($data['page'])?$data['page']:1;
        $pageParams['list_rows'] = isset($data['limit'])?$data['limit']:1000;
        // unset($data['page']);
        // unset($data['limit']);
        //按关键字模糊搜索
        $where=array();
        if(isset($data['keyword'])) {
            $kw = $data['keyword'];
            $where[]=[ 'd.name', 'like' , "%$kw%"];
            $where[]= ['s.name' ,  'like', "%$kw%"];
            $where[]= ['c.FQDN' ,  'like', "%$kw%"];
            $where[]= ['c.asset_id' ,  'like', "%$kw%"];
            $where[]= ['c.MAC' ,  'like', "%$kw%"];
            $where[]= ['c.ip_addr_v4' ,  'like', "%$kw%"];
            $where[]= ['c.domain_name' ,  'like', "%$kw%"];
        };

        //按部门ID搜索
        $wheredpt = array();
        if(isset($data['department_id'])) $wheredpt['d.id'] = $data['department_id'];

        $comp = Db::name('computer')->alias('c')
            ->leftjoin('department d', 'd.id=c.department_id')
            ->leftjoin('staff s','s.id=c.staff_id' )
            ->whereor($where)
            ->where($wheredpt)
            ->field('c.*, d.name as department, s.name as staff')
            ->paginate($pageParams)
            ->toArray();
        if($comp)
        {
            for($i=0; $i<count($comp['data']); $i++)
            {
                $osinfo = Db::name('os')->where('id',$comp['data'][$i]['os_id'])->field('name,version,arch')->find();
                if(!empty($osinfo)){
                    $comp['data'][$i]['os'] = implode('_',$osinfo);
                }
                $ia = Db::name('computerInternetAccess')->where('computer_id',$comp['data'][$i]['id'])->field('access_id')->select();
                // $comp['data'][$i]['ia'] = implode('_',$ia);
                $iaArr = array_column($ia,'access_id');
                $comp['data'][$i]['ia'] = $iaArr;
            }
        }
        $data = removePluginsParams($data);
        return LayuiDataReturn('ok',200,$comp['data'],$comp['total'],$data);
    }
    
    
    public static function saveInfo($data)
    {
        $vali = new CompVali;
        if($vali->check($data))
        {
            //validate OK
            if($data['id'])
            {
                //id不为0,不为空, 修改职员信息
                $data['updated_at'] = date('Y-m-d H:i:s');
                $res = self::where('id',$data['id'])->update($data);
                if($res)
                {
                    //修改成功
                    return DataReturn('修改成功',200);
                } else {
                    //修改失败
                    return DataReturn('没有修改',201);
                }
            } else{
                //id为0或空,新增职员信息
                unset($data['id']);
                $data['created_at'] = date('Y-m-d H:i:s');
                $res=self::insert($data);
                if($res)
                {
                    //成功
                    return DataReturn('新增成功',200);
                } else {
                    //失败
                    return DataReturn('新增失败',201);
                }
            }
        }else{
            //validate failed
            $msg = $vali->getError();
            return DataReturn($msg,310);
        }
    }

    public static function updateComputerInternetAccess($data)
    {
        if(!isset($data['computer_id'])) return DataReturn('参数错误',201);
        $compId = $data['computer_id'];
        unset($data['computer_id']);
        //删除原有数据
        Db::name('computerInternetAccess')->where('computer_id',$compId)->delete();
        $newData = array();
        if(!empty($data))
        {
            foreach($data as $k=>$v)
            {
                $d['computer_id'] = $compId;
                $d['access_id'] = $v;
                $newData[] = $d;
            }
            Db::name('computerInternetAccess')->insertAll($newData);
        }

        return DataReturn('OK',200);
    }
    
    public static function delComputer($data)
    {
        //delete computer software mapping
            Db::name('computerSoftware')->where('computer_id',$data['id'])->delete();
        //delete computer Internet Access mapping
            Db::name('computerInternetAccess')->where('computer_id',$data['id'])->delete();
        //delete computer
            self::where('id',$data['id'])->delete();
        
        return DataReturn('ok',200);
    }


}


?>