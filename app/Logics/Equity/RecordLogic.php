<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/22
 * Time: 下午6:56
 */
namespace App\Logics\Equity;

use App\Logics\Abstracts\Logic;
use App\Structs\Requests\Equity\RecordStruct;
use App\Structs\Results\Equity\RecordResult;

class RecordLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        $struct = RecordStruct::factory($payload);
        //获取订单详情
        $record = $this->equityService->getConsumeRecords($struct);

        return RecordResult::factory($record);
    }
}