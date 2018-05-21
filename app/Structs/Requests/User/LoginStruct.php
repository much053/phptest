<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Requests\User;

use Uniondrug\Structs\Struct;

/**
 * @package App\Structs
 */
class LoginStruct extends Struct
{
    /**
     * 联系方式
     * @var string
     * @Validator(type=string,required)
     */
    public $mobile;

    /**
     * 连锁ID
     * @var string
     * @Validator(type=string,required)
     */
    public $password;
}