<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:14
 */
namespace App\Logics\Order;

use App\Logics\Abstracts\Logic;

class PoolLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        //获取订单详情
        $order = $this->orderService->getPoolRecords($payload);

        return $order;
    }
}