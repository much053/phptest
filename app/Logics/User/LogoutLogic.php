<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:14
 */
namespace App\Logics\User;

use App\Logics\Abstracts\Logic;
use App\Structs\Requests\User\LoginStruct;
use App\Structs\Results\User\LoginResult;

class LogoutLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        $this->userService->logout();
    }
}