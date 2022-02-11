<?php
namespace app\padmin\validate;
use think\Validate;

class Printer extends Validate
{
    protected $rule = [
        'name'  =>  'require|max:32',
        'address' =>  'max:32',
        'netbios'=> 'max:32',
        
    ];

    protected $message  =   [
        'name.require' => '名称必须',
        'name.max'     => '名称最多不能超过个32字符',
        'address'   => '安装地址最多32个字符',
        
        
    ];
    
}


?>