<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Requests\Equity;

use Uniondrug\Structs\PagingRequest;

/**
 * @package App\Structs
 */
class RecordStruct extends PagingRequest
{
    /**
     * @var int
     */
    public $equityId;
}