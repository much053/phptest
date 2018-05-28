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
use App\Logics\Communicate\DetailLogic;
use App\Logics\Communicate\ListLogic;
use App\Logics\Communicate\UpdateLogic;

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
        $input = $this->request->getQuery();

        $logic = ListLogic::factory($input);

        return $this->serviceServer->withStruct($logic);
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
    public function detailAction($id)
    {
        $logic = DetailLogic::factory($id);

        return $this->serviceServer->withData($logic);
    }

    /**
     * @Post('/{id}')
     */
    public function updateAction($id)
    {
        $input = $this->request->getJsonRawBody(1);
        $input['communicateId'] = $id;

        UpdateLogic::factory($input);

        return $this->serviceServer->withSuccess();
    }
}