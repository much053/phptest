<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:14
 */
namespace App\Logics\Communicate;

use App\Logics\Abstracts\Logic;
use App\Structs\Results\Communicate\DetailResult;

class DetailLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        //获取订单详情
        $record = $this->communicateService->detail($payload);

        return $record;
    }
}