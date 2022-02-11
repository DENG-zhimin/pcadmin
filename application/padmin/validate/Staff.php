<?php
namespace app\padmin\validate;
use think\Validate;

class Staff extends Validate
{
    protected $rule = [
        'name'  =>  'require|max:32',
        'email' =>  'email',
        'mobile'=> 'mobile',
        'staff_number' => 'number|max:10'
    ];

    protected $message  =   [
        'name.require' => '名称必须',
        'name.max'     => '名称最多不能超过个32字符',
        'mobile'   => '手机号码不规范',
        'staff_number'  => '工号不规范',
        'email'        => '邮箱格式错误',    
    ];
    
}


?>