<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/18
 * Time: 下午5:56
 */

namespace App\Logics\User;


use App\Logics\Abstracts\Logic;

class MenuLogic extends Logic
{
    /**
     * @inheritdoc
     */
    public function run($payload)
    {
        // TODO: Implement run() method.
        $user = $this->userService->getUser();

        $menu = $this->userService->getMenu($user);

        return $menu;
    }
}