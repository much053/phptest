<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:21
 */

namespace App\Services;

use App\Models\UgOrderRecords;
use App\Services\Abstracts\Service;
use App\Structs\Requests\Order\ListStruct;
use Phalcon\Mvc\Model\Query\Builder;

/**
 * 订单服务类
 * Class OrderService
 * @package App\Services
 */
class PoolService extends Service
{

    public function getList()
    {
        $pools = new Builder;
        $pools->from(['a' => 'App\\Models\\Po']);
    }
}