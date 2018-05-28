<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/17
 * Time: 下午5:45
 */

namespace App\Controllers;

use App\Controllers\Abstracts\Base;
use App\Logics\Member\DetailLogic;

/**
 * 用户类
 * Class UserController
 * @package App\Controllers
 * @RoutePrefix('/members')
 */
class MemberController extends Base
{
    /**
     * 获取用户详情
     * @Get('/{id:([0-9]+)}')
     */
    public function showAction($id)
    {
        $member = DetailLogic::factory($id);

        return $this->serviceServer->withData($member);
    }
}