<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/17
 * Time: 下午5:45
 */

namespace App\Controllers;

use App\Controllers\Abstracts\Base;
use App\Logics\Equity\ListLogic;
use App\Logics\Equity\RecordLogic;

/**
 * 权益类
 * Class EquityController
 * @package App\Controllers
 * @RoutePrefix('/equity')
 */
class EquityController extends Base
{
    /**
     * 获取权益列表
     * @Get('')
     * @return \Phalcon\Http\Response
     */
    public function indexAction()
    {
        $input = $this->request->getQuery();

        $logic = ListLogic::factory($input);

        return $this->serviceServer->withData($logic);
    }

    /**
     * 获取权益详情
     * @Get('/{id:([0-9]+)}/records')
     * @param $id
     * @return \Phalcon\Http\Response
     */
    public function recordAction($id)
    {
        $input = $this->request->getQuery();
        $input['equityId'] = $id;

        $logic = RecordLogic::factory($input);

        return $this->serviceServer->withStruct($logic);
    }
}