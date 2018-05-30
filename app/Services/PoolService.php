<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:21
 */

namespace App\Services;

use App\Services\Abstracts\Service;
use App\Structs\Requests\Pool\ListStruct;
use Phalcon\Mvc\Model\Query\Builder;

/**
 * 订单服务类
 * Class OrderService
 * @package App\Services
 */
class PoolService extends Service
{

    public function getList($struct)
    {
        $builder = new Builder;
        $builder->from(['a' => 'App\\Models\\PoolRecords']);
        $builder->orderBy('id desc');
        $pools = $this->withQueryPaging($builder, $struct->page, $struct->limit);
        return $pools;
    }
}