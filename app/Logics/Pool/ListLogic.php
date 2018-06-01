<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:14
 */
namespace App\Logics\Pool;

use App\Logics\Abstracts\Logic;
use App\Structs\Results\Pool\ListResult;
use App\Structs\Requests\Pool\ListStruct;

class ListLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        $struct = ListStruct::factory($payload);

        //获取资金池列表
        $pools = $this->poolService->getList($struct);

        $statistic = $this->poolService->getStatistic($struct);

        $result = ListResult::factory($pools);
        $result->with(['statistic' => $statistic]);

        return $result;
    }
}