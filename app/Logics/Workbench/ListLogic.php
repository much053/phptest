<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:14
 */
namespace App\Logics\Workbench;

use App\Logics\Abstracts\Logic;
use App\Structs\Requests\Workbench\ListStruct;
use App\Structs\Results\Communicate\ListResult;

class ListLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        $struct = ListStruct::factory($payload);

        //获取订单详情
        $data = $this->communicateService->getList($struct);

        //统计数据
        $statistic = $this->communicateService->countStatistic($struct);

        $list = ListResult::factory($data);
        $list->with(['statistic' => $statistic]);

        return $list;
    }
}