<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:21
 */

namespace App\Services;

use App\Errors\Code;
use App\Errors\Error;
use App\Models\UgOrderRecords;
use App\Services\Abstracts\Service;
use App\Structs\Results\Equity\RecordResult;
use Phalcon\Mvc\Model\Query\Builder;

/**
 * 权益类Service
 * Class OrderService
 * @package App\Services
 */
class EquityService extends Service
{
    public function getList($struct)
    {
        $url = $this->config->path('host.equity_host').'/equity/paging';

        $options = [
            'json' => [
                ''
            ]
        ];
        try {
            $res = $this->httpClient->post($url, $options);
        } catch (\Exception $e) {
            throw new Error(Code::FAILURE_CREATE, "网络繁忙，请稍后重试");
        }




    }

    /**
     * 获取权益消费记录
     * @param RecordResult $struct
     * @return \stdClass
     */
    public function getConsumeRecords(RecordResult $struct)
    {
        $builder = new Builder();
        $builder->columns('a.id as orderId,a.order_no as orderNo,show_amount as totalAmount,a.created_at as createdAt,partner_name as partnerName,shop_id as isOnline,service_name as serviceName');
        $builder->where("account_id = ".$struct->equityId.' and a.status = '.UgOrderRecords::ORDER_PASSED);
        $builder->from(["a" => "App\\Models\\UgOrderRecords"]);
        $builder->join('App\\Models\\UgOrderClaims', 'c.order_no = a.order_no', 'c');
        $builder->orderBy('a.id desc');

        $orders = $this->withQueryPaging($builder, $struct->page, $struct->limit);

        return $orders;
    }
}