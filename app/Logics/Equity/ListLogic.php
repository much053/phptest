<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:14
 */
namespace App\Logics\Equity;

use App\Logics\Abstracts\Logic;
use App\Structs\Results\Communicate\ListResult;
use App\Structs\Requests\Communicate\ListStruct;

class ListLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        $struct = ListStruct::factory($payload);

        //获取订单详情
        $orders = $this->equityService->getList($struct);

        return $orders;
    }
}