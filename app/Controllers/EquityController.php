<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/17
 * Time: 下午5:45
 */

namespace App\Controllers;

use App\Controllers\Abstracts\Base;
use App\Logics\Equity\RecordLogic;
use App\Logics\Order\DetailLogic;
use App\Logics\Order\ListLogic;

/**
 * 权益类
 * Class EquityController
 * @package App\Controllers
 * @RoutePrefix('/equity')
 */
class EquityController extends Base
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
     * @Get('/{id:([0-9]+)}/records')
     */
    public function recordAction($id)
    {
        $input = $this->request->getQuery();
        $input['equityId'] = $id;

        $logic = RecordLogic::factory($input);

        return $this->serviceServer->withStruct($logic);
    }
}