<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Requests\Workbench;

use Uniondrug\Structs\PagingRequest;

/**
 * @package App\Structs
 */
class ListStruct extends PagingRequest
{
    /**
     * 员工ID
     * @var int
     * @Validator(type=int)
     */
    public $workerId;

    /**
     * 开始时间
     * @var string
     * @Validator(type=string)
     */
    public $startDate;

    /**
     * 结束时间
     * @var string
     * @Validator(type=string)
     */
    public $endDate;

    /**
     * 是否处理
     * @var int
     * @Validator(type=int)
     */
    public $isFinish;
}