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

    public function getList(ListStruct $struct)
    {
        $builder = new Builder;
        $builder->columns("a.id,a.order_no as orderNo,partner_name as partnerName,store_name as storeName,erp_sn as erpSn,a.create_time as createdAt,type");
        $builder->from(['a' => 'App\\Models\\PoolRecords']);
        $builder->join("App\\Models\\UgOrderRecords", "r.order_no = a.order_no", "r", "left");
        $builder->join("App\\Models\\UgOrderErps", "e.order_no = a.order_no", "e", "left");
        $builder->orderBy('id desc');
        $pools = $this->withQueryPaging($builder, $struct->page, $struct->limit);
        return $pools;
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