<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date 2018-03-19
 */
namespace App\Structs\Results\User;

use App\Structs\Traits\ExampleTrait;
use Uniondrug\Structs\Struct;

/**
 * @package App\Structs\Results
 */
class LoginResult extends Struct
{
    /**
     * token
     * @var string
     * @Validator(type=string,required)
     */
    public $token;

    /**
     * 员工ID
     * @var int
     * @Validator(type=int,required)
     */
    public $workerId;

    /**
     * 员工姓名
     * @var string
     * @Validator(type=string,required)
     */
    public $workerName;

    /**
     * 员工角色
     * @var string
     * @Validator(type=string,required)
     */
    public $workerRoleId;

    /**
     * 员工角色
     * @var string
     * @Validator(type=string,required)
     */
    public $workerRoleName;

    /**
     * 用户ID
     * @var int
     * @Validator(type=string,required)
     */
    public $memberId;

    /**
     * 手机号
     * @var string
     * @Validator(type=string,required)
     */
    public $mobile;

    /**
     * 商户ID
     * @var int
     * @Validator(type=int,required)
     */
    public $merchantId;

    /**
     * 商户名称
     * @var string
     * @Validator(type=string,required)
     */
    public $merchantName;

    /**
     * 商户logo
     * @var string
     * @Validator(type=string)
     */
    public $merchantLogo;
}
