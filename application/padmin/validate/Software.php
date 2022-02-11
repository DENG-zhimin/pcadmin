<?php
namespace app\padmin\validate;
use think\Validate;

class Software extends Validate
{
    protected $rule = [
        'name'  =>  'require|max:32',
        'version' =>  'max:30',
        
    ];

    protected $message  =   [
        'name.require' => '名称必须',
        'name.max'     => '名称最多不能超过个32字符',
        
    ];
    
}


?>