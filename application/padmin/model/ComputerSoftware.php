<?php 
namespace app\padmin\model;

use think\Model;
use think\Db;

class ComputerSoftware extends Model
{

    public static function updateComputerSoftware($data)
    {
        if(!isset($data['computer_id'])) return DataReturn('参数错误',201); //没有定义电脑ID
        $computerId = $data['computer_id'];
        unset($data['computer_id']);
        $newData = array();
        foreach($data as $k=>$v)
        {
            $map['computer_id'] = $computerId;
            $map['software_id'] = $v;
            $newData[] = $map;
        }

        //delete old data
        self::where('computer_id',$computerId)->delete();

        //insert newData
        self::insertAll($newData);

        return DataReturn('ok',200);
    }


}