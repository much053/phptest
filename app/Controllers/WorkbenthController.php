<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/25
 * Time: 上午10:13
 */

namespace App\Controllers;


use App\Controllers\Abstracts\Base;
use App\Logics\Workbench\ListLogic;

/**
 * Class WorkbenthController
 * @package App\Controllers
 * @RoutePrefix('/workbench')
 */
class WorkbenthController extends Base
{
    /**
     * @Get('/communicate')
     * @return \Phalcon\Http\Response
     */
    public function communicateAction()
    {
        $input = $this->request->getQuery();

        $logic = ListLogic::factory($input);

        return $this->serviceServer->withStruct($logic);
    }
}