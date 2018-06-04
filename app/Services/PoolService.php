<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:21
 */

namespace App\Services;

use App\Models\PoolRecords;
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

    public function getList(ListStruct $struct)
    {
        $builder = new Builder;
        $builder->from('App\\Models\\PoolRecords');
        $builder->orderBy('id desc');
        $pools = $this->withQueryPaging($builder, $struct->page, $struct->limit);
        return $pools;
    }

    public function detail($id)
    {
        $pool = PoolRecords::findFirst($id);

        return [
            'id' => $pool->id,
            'orderNo' => $pool->order_no,
            'serviceName' => $pool->order->service_name,
            'erpSn' => $pool->erp->erp_sn,
            'partnerName' => $pool->order->partner_name,
            'storeName' => $pool->order->store_name,
            'createdAt' => $pool->create_time,
            'typeText' => $pool->getTypeText(),
            'comment' => $pool->comment,
            'originAmount' => $pool->origin_fund,
            'incomeAmount' => $pool->type != 1?$pool->op_fund:'0.00',
            'expendAmount' => $pool->type == 1?$pool->op_fund:'0.00',
            'finalAmount' => $pool->final_fund
        ];
    }


    public function getStatistic(ListStruct $struct)
    {
        $return = [
            'totalCount' => '45',
            'incomeCount' => '1',
            'expendCount' => '44',
            'incomeAmount' => '2000.00',
            'expendAmount' => '1000.00',
            'originAmount' => '7000.00',
            'finalAmount' => '6000.00'
        ];

        return $return;
    }
}