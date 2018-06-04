<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date 2018-03-19
 */
namespace App\Structs\Results\Pool;

use App\Models\UgOrderErps;
use App\Structs\Traits\ExampleTrait;
use Uniondrug\Structs\Struct;

/**
 * @package App\Structs\Results
 */
class Row extends Struct
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     * @alias order_no
     */
    public $orderNo;

    /**
     * @var string
     * @alias create_time
     */
    public $createdAt;

    /**
     * @var string
     * @alias partner_name
     */
    public $partnerName;

    /**
     * @var string
     * @alias store_name
     */
    public $storeName;

    /**
     * @var string
     */
    public $typeText;

    /**
     * @var string
     * @alias erp_sn
     */
    public $erpSn;
}
