<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/17
 * Time: 下午2:49
 */

namespace App\Controllers;

use App\Controllers\Abstracts\Base;
use App\Logics\Communicate\AddLogic;

/**
 * Class CommunicateController
 * @package App\Controllers
 * @RoutePrefix('/communicate')
 */
class CommunicateController extends Base
{
    /**
     * @Get('/')
     */
    public function indexAction()
    {

    }

    /**
     * @Post('/')
     */
    public function newAction()
    {
        $input = $this->request->getJsonRawBody(1);

        AddLogic::factory($input);

        return $this->serviceServer->withSuccess();
    }

    /**
     * @Get('/{id}')
     */
    public function detailAction()
    {

    }

    /**
     * @Put('/{id}')
     */
    public function updateAction()
    {

    }
}