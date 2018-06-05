<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:14
 */
namespace App\Logics\Order;

use App\Logics\Abstracts\Logic;
use App\Structs\Requests\Order\ListStruct;

class ExcelLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        //获取订单详情
        $struct = ListStruct::factory($payload);

        $this->orderService->excelExport($struct);
    }
}