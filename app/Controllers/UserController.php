<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/17
 * Time: 下午5:45
 */

namespace App\Controllers;

use App\Controllers\Abstracts\Base;
use App\Logics\User\LoginLogic;
use App\Logics\User\LogoutLogic;
use App\Logics\User\MenuLogic;

/**
 * 用户类
 * Class UserController
 * @package App\Controllers
 * @RoutePrefix('/users')
 */
class UserController extends Base
{
    /**
     * 用户登陆
     * @Post('/login')
     * @return \Phalcon\Http\Response
     */
    public function loginAction()
    {
        $input = $this->request->getJsonRawBody(1);

        $logic = LoginLogic::factory($input);

        return $this->serviceServer->withStruct($logic);
    }

    /**
     * @Post('/logout')
     * @return \Phalcon\Http\Response
     */
    public function logoutAction()
    {
        LogoutLogic::factory();

        return $this->serviceServer->withSuccess();
    }

    /**
     * @Get('/menu')
     * @return \Phalcon\Http\Response
     */
    public function menuAction()
    {
        $logic = MenuLogic::factory();

        return $this->serviceServer->withSuccess($logic);
    }
}