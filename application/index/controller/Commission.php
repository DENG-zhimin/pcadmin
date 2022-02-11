<?php

namespace app\index\controller;

use app\service\CommissionService;

class Commission extends Common
{

    public function Index()
    {
        CommissionService::DoneConsumBonus();
    }

}
?>