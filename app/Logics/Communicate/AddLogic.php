<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:14
 */
namespace App\Logics\Communicate;

use App\Logics\Abstracts\Logic;
use App\Structs\Requests\Communicate\AddStruct;

class AddLogic extends Logic
{
    /**
     * @inheritdoc
     */
    function run($payload)
    {
        // 业务代码
        $struct = AddStruct::factory($payload);

        $this->communicateService->add($struct);
    }
}