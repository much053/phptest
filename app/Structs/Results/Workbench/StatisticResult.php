<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Requests\Workbench;

use Uniondrug\Structs\Struct;

/**
 * @package App\Structs
 */
class StatisticResult extends Struct
{
    /**
     * 所有数量
     * @var int
     * @Validator(type=int)
     */
    public $count;

    /**
     * 完成数量
     * @var int
     * @Validator(type=int)
     */
    public $countFinish;

    /**
     * 未完成数量
     * @var int
     * @Validator(type=int)
     */
    public $countUnfinish;
}