<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:14
 */
namespace App\Logics\Member;

use App\Logics\Abstracts\Logic;

class DetailLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($memberId)
    {
        //获取订单详情
        $user = $this->userService->getMember($memberId);

        return DetailResult::factory($user);
    }
}