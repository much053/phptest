<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Results\Workbench;

use App\Structs\Requests\Workbench\StatisticResult;
use Uniondrug\Structs\PaginatorStruct;

/**
 * @package App\Structs
 */
class ListResult extends PaginatorStruct
{
    /**
     * @var \App\Structs\Results\Communicate\Row[]
     */
    public $body;

    /**
     * @var StatisticResult
     */
    public $statistic;
}