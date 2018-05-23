<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Results\Equity;

use App\Structs\Results\Example\Row;
use Uniondrug\Structs\PaginatorStruct;

/**
 * @package App\Structs
 */
class RecordResult extends PaginatorStruct
{
    /**
     * @var2 Row[]
     * @var \App\Structs\Results\Order\Row[]
     */
    public $body;
}