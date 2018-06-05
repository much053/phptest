<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:14
 */
namespace App\Logics\Order;

use App\Logics\Abstracts\Logic;
use App\Structs\Results\Order\ListResult;
use App\Structs\Requests\Order\ListStruct;

class ListLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        $struct = ListStruct::factory($payload);

        //获取订单详情
        $orders = $this->orderService->getPaging($struct);

        return ListResult::factory($orders);
    }
}