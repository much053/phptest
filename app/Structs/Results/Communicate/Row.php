<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date 2018-03-19
 */
namespace App\Structs\Results\Communicate;

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
    public $communicateId;

    /**
     * @var string
     */
    public $mobile;

    /**
     * @var string
     */
    public $workerId;

    /**
     * @var string
     */
    public $workerName;

    /**
     * @var string
     */
    public $orderNo;

    /**
     * @var string
     */
    public $partnerId;

    /**
     * @var string
     */
    public $storeId;

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $isFinish;

    /**
     * @var string
     */
    public $isComplain;

    /**
     * @var int
     */
    public $fromPlat;

    /**
     * @var string
     */
    public $fromPlatText;

    /**
     * @var string
     */
    public $gmtCreated;
}
