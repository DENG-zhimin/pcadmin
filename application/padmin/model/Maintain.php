<?php 
namespace app\padmin\model;

use app\padmin\validate\Maintain as Vali;
use think\Model;

class Maintain extends Model
{
    public static function saveMaintain($data)
    {
        $vali = new Vali;
        if($vali->check($data))     //校验数据
        {
            //validate OK
            if($data['id'])
            {
                //id不为0,不为空, 修改信息
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


}


?>