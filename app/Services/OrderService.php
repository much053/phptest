<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:21
 */

namespace App\Services;

use App\Models\UgOrderItems;
use App\Models\UgOrderRecords;
use App\Services\Abstracts\Service;

/**
 * 订单服务类
 * Class OrderService
 * @package App\Services
 */
class OrderService extends Service
{
    public function detail($orderId)
    {
        $order = UgOrderRecords::findFirst($orderId);

        $return = [
            'orderId' => $order->id,
            'orderNo' => $order->order_no,
            'serviceId' => $orderId->service_id,
            'serviceName' => $order->service_name,
            'saleAmount' => $order->sale_amount,
            'freeAmount' => $order->free_amount,
            'couponAmount' => $order->coupon_amount,
            'discountAmount' => $order->discount_amount,
            'totalAmount' => $order->show_amount,
            'createdAt' => $order->createdAt,
            'memberName' => $order->member_name,
            'memberIdcard' => $order->member_idcard,
            'memberMobile' => $order->member_mobile,
            'partnerName' => $order->partner_name,
            'storeName' => $order->store_name,
            'assistantName' => $order->assistant_name,
            'assistantMobile' => $order->assistantMobile,
            'items' => $this->getItems($order)
        ];

        return $return;
    }

    public function getItems(UgOrderRecords $order)
    {
        $items = $order->items;

        $data = $this->combineItems($items);

        return $data;
    }

    /**
     * 合并药品
     * @param $items
     */
    public function combineItems($items)
    {
        $data = [];
        if (count($items)) {
            foreach ($items as $key => $item) {
                $k = $item->common_name.$item->internal_id;
                if ($data[$k]) {
                    $data[$k]['count'] += $data[$k]['amount'];
                    $data[$k]['totalPrice'] = sprintf('%.2f',$data[$k]['count'] * $data[$k]['unitPrice']);
                } else {
                    $data[$k] = [
                        'itemId' => $item->id,
                        'tradeCode' => $item->trade_code?:'',
                        'commonName' => $item->common_name,
                        'approvalNumber' => $item->approval_number?:'',
                        'internalId' => $item->internal_id?:'',
                        "unitPrice" =>  $item->unit_price,
                        "count" => $item->amount,
                        "pack" => $item->pack,
                        "totalPrice" => $item->total_price,
                        "manufacturer" => $item->manufacturer?:'',
                        'isGuarantee' => $item->is_guarantee
                    ];
                }
            }
        }

        return array_values($data);
    }
}