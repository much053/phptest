<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Results\Order;

use Uniondrug\Structs\PaginatorStruct;

/**
 * @package App\Structs
 */
class ListResult extends PaginatorStruct
{
    /**
     * @var \App\Structs\Results\Order\Row[]
     */
    public $body;

    /**
     * @var \App\Structs\Results\Order\StatisticResult
     */
    public $statistic;
}