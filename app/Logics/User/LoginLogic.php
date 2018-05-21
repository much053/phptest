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

class LoginLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        // 业务代码
        $struct = LoginStruct::factory($payload);

        $user = $this->userService->login($struct);

        $data = $this->userService->makeToken($user);

        return LoginResult::factory($data);
    }
}