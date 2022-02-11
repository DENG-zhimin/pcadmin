<?php
// +----------------------------------------------------------------------

// | Copyright (c) 2019~2019 http://www.bowh.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ONE
// +----------------------------------------------------------------------


/**
 * 商品服务层
 * @author   ONE
 
 * @version  0.0.1
 * @datetime 2016-12-01T21:51:08+0800
 */
class XinConst
{
    //消费返利类型
    const AWARD_TYPE_CONSUM_BONUS_MEMBER = 1;//会员消费奖励（订单）
    const AWARD_TYPE_CONSUM_BONUS_STORE = 2;//商户消费流水奖励（订单）


    //消费返利百分比
    const AWARD_TYPE_CONSUM_BONUS_REFERRER_PERCENT = 5;//消费者上级返利比
    const AWARD_TYPE_CONSUM_BONUS_STORE_PERCENT = 10;//消费者绑定商户返利比
    const AWARD_TYPE_CONSUM_BONUS_AGENT_PERCENT = 6;//消费者绑定商户的经销商返利比
    const AWARD_TYPE_CONSUM_BONUS_CITY_PERCENT = 2;//市级城市合伙人返利比
    const AWARD_TYPE_CONSUM_BONUS_COUNTY_PERCENT = 1;//县级城市合伙人返利比

    //商户流水返利百分比
    const AWARD_TYPE_SUPPLIER_FLOW_AGENT_PERCENT = 5;//所辖商户流水返利比
    const AWARD_TYPE_SUPPLIER_FLOW_ESTATE_PERCENT = 20;//所辖社区商户流水返利比
    const AWARD_TYPE_SUPPLIER_FLOW_CITY_PERCENT = 2;//市级城市合伙人返利比
    const AWARD_TYPE_SUPPLIER_FLOW_COUNTY_PERCENT = 1;//县级城市合伙人返利比

    //积分变动类型
    const AWARD_TYPE_CONSUM_BONUS_REFERRER_TYPE = 1;//下级用户消费返利所得
    const AWARD_TYPE_CONSUM_BONUS_AGENT_TYPE = 2;//经销商推荐商户绑定用户消费返利所得
    const AWARD_TYPE_CONSUM_BONUS_CITY_TYPE = 3;//市级城市合伙人返利所得（消费者）
    const AWARD_TYPE_CONSUM_BONUS_DISTRICT_TYPE = 4;//区县级城市合伙人返利所得（消费者）

    const AWARD_TYPE_SUPPLIER_FLOW_AGENT_TYPE = 5;//经销商所辖商户流水返利所得
    const AWARD_TYPE_SUPPLIER_FLOW_DISTRICT_TYPE = 6;//区县级城市合伙人返利所得（商户流水）
    const AWARD_TYPE_SUPPLIER_FLOW_CITY_TYPE = 7;//市级城市合伙人返利所得（商户流水）
    const AWARD_TYPE_SUPPLIER_FLOW_ESTATE_TYPE = 8;//所辖社区商户流水返利所得


    //用户中心积分变动
    const MEMBER_WITHDRAW_MONEY = 100;//用户提现申请扣除
    const MEMBER_WITHDRAW_REFUND_MONEY = 101;//用户提现申请扣除失败退回

    const PAYMENT_GOODS_ORDER = 200;//购买商品
    const REFUND_GOODS_ORDER = 201;//购买商品退款

}
?>