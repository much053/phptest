<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:14
 */
namespace App\Logics\Pool;

use App\Logics\Abstracts\Logic;

class DetailLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        //获取订单详情
        $order = $this->poolService->detail($payload);

        return $order;
    }
}