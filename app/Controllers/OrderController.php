<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/17
 * Time: 下午5:45
 */

namespace App\Controllers;

use App\Controllers\Abstracts\Base;
use App\Logics\Order\DetailLogic;
use App\Logics\Order\ListLogic;

/**
 * 用户类
 * Class UserController
 * @package App\Controllers
 * @RoutePrefix('/orders')
 */
class OrderController extends Base
{
    /**
     * @Get('')
     */
    public function indexAction()
    {
        $input = $this->request->getQuery();

        $logic = ListLogic::factory($input);

        return $this->serviceServer->withStruct($logic);
    }

    /**
     * @Get('/{id:([0-9]+)}')
     */
    public function detailAction($id)
    {
        $logic = DetailLogic::factory($id);

        return $this->serviceServer->withData($logic);
    }

    /**
     * @Get('/{id:([0-9]+)}/pools')
     */
    public function poolAction($id)
    {
        $logic = PoolLogic::factory($id);

        return $this->serviceServer->withData($logic);
    }
}