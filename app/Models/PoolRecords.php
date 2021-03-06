<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/6/1
 * Time: 下午4:34
 */

namespace App\Models;


use App\Models\Abstracts\Model;

class PoolRecords extends Model
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->setConnectionService("db1");

        $this->hasOne(
            'order_no',
            __NAMESPACE__.'\\UgOrderRecords',
            'order_no',
            [
                'alias' => 'order'
            ]
        );

        $this->hasOne(
            'order_no',
            __NAMESPACE__.'\\UgOrderErps',
            'order_no',
            [
                'alias' => 'erp'
            ]
        );

        $this->hasOne(
            'partner_id',
            __NAMESPACE__.'\\Partners',
            'id',
            [
                'alias' => 'partner'
            ]
        );
    }

    public function getTypeText()
    {
        $arr = ['1' => '支出', '2' => '充值', '3' => '返还'];
        return $arr[$this->type];
    }

    public function getErpSn()
    {
        return $this->erp?$this->erp->erp_sn:'';
    }

    public function getPartnerName()
    {
        return $this->order?$this->order->partner_name:'';
    }

    public function getStoreName()
    {
        return $this->order?$this->order->store_name:'';
    }
}