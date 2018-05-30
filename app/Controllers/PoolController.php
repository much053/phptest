<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/17
 * Time: 下午5:45
 */

namespace App\Controllers;

use App\Controllers\Abstracts\Base;
use App\Logics\Pool\DetailLogic;
use App\Logics\Pool\ListLogic;

/**
 * 用户类
 * Class UserController
 * @package App\Controllers
 * @RoutePrefix('/pools')
 */
class PoolController extends Base
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
}