<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:14
 */
namespace App\Logics\User;

use App\Logics\Abstracts\Logic;
use App\Structs\Results\User\DetailResult;

class ListLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        //获取订单详情
        $users = $this->userService->getUsers();

        return $users;
    }
}