<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Requests\Pool;

use Uniondrug\Structs\PagingRequest;
use Uniondrug\Structs\Struct;

/**
 * @package App\Structs
 */
class ListStruct extends PagingRequest
{
    /**
     * 连锁ID
     * @var int
     * @Validator(type=int)
     */
    public $partnerId;

    /**
     * 门店ID
     * @var int
     * @Validator(type=int)
     */
    public $storeId;

    /**
     * ERP流水号
     * @var int
     * @Validator(type=int)
     */
    public $erpSn;

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
}