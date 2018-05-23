<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Requests\Communicate;

use Uniondrug\Structs\Struct;

/**
 * @package App\Structs
 */
class AddStruct extends Struct
{
    /**
     * 用户姓名
     * @var string
     * @Validator(type=string,required)
     */
    public $fullName;

    /**
     * 订单号
     * @var string
     * @Validator(type=string)
     */
    public $orderNo;

    /**
     * 联系方式
     * @var string
     * @Validator(type=string,required)
     */
    public $mobile;

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
     * 沟通记录
     * @var string
     * @Validator(type=string,required)
     */
    public $content;

    /**
     * 是否为投诉意见
     * @var int
     * @Validator(type=int)
     */
    public $isComplain;


    /**
     * 处理结果
     * @var int
     * @Validator(type=int)
     */
    public $isFinish;
}