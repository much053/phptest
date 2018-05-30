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
use App\Models\UgOrderClaims;
use App\Models\UgOrderRecords;
use App\Services\Abstracts\Service;
use App\Structs\Requests\Equity\RecordStruct;
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

        if ($struct->mobile) {
            $member = $this->serviceSdk->user->getMemberInfo(['mobile' => $struct->mobile])->getData();
            $option['memberId'] = $member->memberId?:0;
        }

        if ($struct->equityNo) {
            $option['equityNo'] = $struct->equityNo;
        }

        if ($struct->orderNo) {
            $claim = UgOrderClaims::findFirstByOrderNo($struct->orderNo);
            $option['equityId'] = $claim->account_id;
        }

        try {
            $res = $this->httpClient->post($url, ['json' => $option]);
        } catch (\Exception $e) {
            throw new Error(Code::FAILURE_CREATE, "网络繁忙，请稍后重试");
        }

        $data = json_decode($res->getBody()->__toString(), 1);

        return $data['data'];
    }

    public function getDetailByEquityNo($equityNo)
    {
        $url = $this->config->path('host.equity_host').'/equity/detail';

        $options = [
            'json' => [
                'equityNo' => $equityNo
            ]
        ];

        try {
            $res = $this->httpClient->post($url, $options);
        } catch (\Exception $e) {
            throw new Error(Code::FAILURE_CREATE, "网络繁忙，请稍后重试");
        }

        $data = json_decode($res->getBody()->__toString());

        return $data->data;
    }

    /**
     * 获取权益消费记录
     * @param RecordResult $struct
     * @return \stdClass
     */
    public function getConsumeRecords(RecordStruct $struct)
    {
        $builder = new Builder();
        $builder->columns('a.id as orderId,a.order_no as orderNo,show_amount as totalAmount,a.created_at as createdAt,partner_name as partnerName,shop_id as isOnline,service_name as serviceName');
        $builder->where("account_id = ".$struct->equityId.' and a.status = '.UgOrderRecords::ORDER_PASSED);
        $builder->from(["a" => "App\\Models\\UgOrderRecords"]);
        $builder->join('App\\Models\\UgOrderClaims', 'c.order_no = a.order_no', 'c');
        $builder->orderBy('a.id desc');

        $records = $this->withQueryPaging($builder, $struct->page, $struct->limit);

        return $records;
    }
}