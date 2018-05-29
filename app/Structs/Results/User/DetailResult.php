<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Results\User;

use Uniondrug\Structs\Struct;

/**
 * @package App\Structs
 */
class DetailResult extends Struct
{
    /**
     * @var string
     */
    public $token;

    /**
     * @var int
     */
    public $workerId;

    /**
     * @var string
     */
    public $workerName;

    /**
     * @var string
     */
    public $workerRoleId;

    /**
     * @var string
     */
    public $workerRoleName;

    /**
     * @var int
     */
    public $memberId;

    /**
     * @var string
     */
    public $mobile;

    /**
     * @var int
     */
    public $merchantId;

    /**
     * @var string
     */
    public $merchantName;

    /**
     * @var string
     */
    public $merchantLogo;
}