<?php
namespace app\padmin\validate;
use think\Validate;

class Maintain extends Validate
{
    protected $rule = [
        'applicant'  =>  'max:8',       //申请人
        // 'app_time' =>  'dateformat: y-m-d h:i',
        // 'department_approve_time' =>  'dateformat: y-m-d h:i',
        // 'manager_approve_time' =>  'dateformat: y-m-d h:i',
        // 'maintain_time' =>  'dateformat: y-m-d h:i',
        
        
    ];

    protected $message  =   [
        // 'name.require' => '名称必须',
        // 'name.max'     => '名称最多不能超过个32字符',
        // 'address'   => '安装地址最多32个字符',
        
        
    ];
    
}


?>