<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Requests\Order;

use Uniondrug\Structs\PagingRequest;
use Uniondrug\Structs\Struct;

/**
 * @package App\Structs
 */
class ListStruct extends PagingRequest
{
    /**
     * 订单号
     * @var string
     * @Validator(type=string)
     */
    public $orderNo;

    /**
     * 权益卡号
     * @var string
     * @Validator(type=string)
     */
    public $equityNo;

    /**
     * 手机号
     * @var string
     * @Validator(type=string)
     */
    public $mobile;

    /**
     * 手机号类型
     * @var int
     * @Validator(type=int)
     */
    public $mobileType;

    /**
     * 时间类型 1 创建时间 2 激活时间 3 审核时间
     * @var int
     * @Validator(type=int)
     */
    public $dateType = 1;

    /**
     * 开始时间
     * @var string
     * @Validator(type=string)
     */
    public $startDate;

    /**
     * 结束时间
     * @var string
     * @Validator(type=string)
     */
    public $endDate;

    /**
     * 是否是线上订单
     * @var int
     * @Validator(type=int)
     */
    public $isOnline;

    /**
     * 连锁ID
     * @var int
     * @Validator(type=int)
     */
    public $partnerId;

    /**
     * Erp流水号
     * @var string
     * @Validator(type=string)
     */
    public $erpSn;

    /**
     * 门店ID
     * @var int
     * @Validator(type=int)
     */
    public $storeId;

    /**
     * 审核状态
     * @var int
     * @Validator(type=int)
     */
    public $status;

    /**
     * 审核状态
     * @var int
     * @Validator(type=int)
     */
    public $productId;

    /**
     * 是否是直付订单
     * @var int
     * @Validator(type=int)
     */
    public $isDirect;
}