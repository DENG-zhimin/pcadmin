<?php
namespace app\padmin\validate;
use think\Validate;

class Computer extends Validate
{
    protected $rule = [
        'computer_name'  =>  'max:32',
        'brand' =>  'max:30',
        'model' =>  'max:30',
        'monitor_brand' =>  'max:30',
        'monitor_model' =>  'max:30',
        'cpu_info' =>  'max:30',
        'hd' =>  'max:30',
        'mouse' =>  'max:30',
        'keyboard' =>  'max:30',
        'graphic_card' =>  'max:30',
        'FQDN' =>  'max:30',
        'domain_name' =>  'max:64',
        'forest_name' =>  'max:64',
        'MAC' =>  'max:20',
        
    ];

    protected $message  =   [
        'computer_name.max'     => '名称最多不能超过个32字符',
        
    ];
    
}


?>