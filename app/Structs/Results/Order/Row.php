<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date 2018-03-19
 */
namespace App\Structs\Results\Order;

use App\Structs\Traits\ExampleTrait;
use Uniondrug\Structs\Struct;

/**
 * @package App\Structs\Results
 */
class Row extends Struct
{
    /**
     * @var string
     */
    public $orderId;

    /**
     * @var string
     */
    public $orderNo;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var string
     */
    public $totalAmount;

    /**
     * @var string
     */
    public $serviceName;

    /**
     * @var string
     */
    public $partnerName;

    /**
     * @var string
     */
    public $isOnline;
}
