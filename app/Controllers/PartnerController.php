<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/17
 * Time: 下午5:45
 */

namespace App\Controllers;

use App\Controllers\Abstracts\Base;
use App\Logics\Partner\ListLogic;
use App\Logics\Partner\StoreLogic;

/**
 * 用户类
 * Class PartnerController
 * @package App\Controllers
 * @RoutePrefix('/partners')
 */
class PartnerController extends Base
{
    /**
     * 获取连锁列表
     * @Get('/')
     * @return \Phalcon\Http\Response
     */
    public function indexAction()
    {
        $logic = ListLogic::factory();

        return $this->serviceServer->withListData($logic);
    }

    /**
     * 根据连锁下所有门店
     * @Get('/{id:([0-9]+)}/stores')
     * @return \Phalcon\Http\Response
     */
    public function storeAction($id)
    {
        $logic = StoreLogic::factory($id);

        return $this->serviceServer->withListData($logic);
    }
}