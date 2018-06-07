<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Results\Order;

use Uniondrug\Structs\Struct;

/**
 * @package App\Structs
 */
class StatisticResult extends Struct
{
    /**
     * 所有数量
     * @var string
     * @Validator(type=string)
     */
    public $totalCount;

    /**
     * 收入笔数
     * @var string
     * @Validator(type=string)
     */
    public $totalAmount;

    /**
     * 支出笔数
     * @var string
     * @Validator(type=string)
     */
    public $freeAmount;

    /**
     * 收入金额
     * @var string
     * @Validator(type=string)
     */
    public $saleAmount;
}