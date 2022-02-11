<?php 
namespace app\padmin\model;

use app\padmin\validate\Software as StaffVali;
use think\Model;

class Software extends Model
{
    public static function saveSoftware($data)
    {
        $vali = new StaffVali;
        if($vali->check($data))
        {
            //validate OK
            if($data['id'])
            {
                //id不为0,不为空, 修改
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
                //id为0或空,新增信息
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

    public static function delSoftware(array $data)
    {
        foreach($data as $v)
        {
            //delete computer software mapping
            Db::name('computerSoftware')->where('software_id',$v)->delete();
            //delete software
            self::where('id',$v)->delete();
        }
        return DataReturn('ok',200);
    }

}


?>