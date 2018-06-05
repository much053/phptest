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
class OrderService extends Service
{
    /**
     * 获取订单列表数据
     * @param ListStruct $struct
     * @return \stdClass
     */
    public function getPaging(ListStruct $struct)
    {
        $builder = new Builder();
        $builder->columns('a.id as orderId,a.order_no as orderNo,show_amount as totalAmount,a.created_at as createdAt,partner_name as partnerName,store_name as storeName,assistant_name as assistantName,shop_id as isOnline,service_name as serviceName,sale_amount as saleAmount,checked_at as checkedAt,a.status,e.erp_sn as erpSn,e.erp_img as erpImg');
        $builder->from(["a" => "App\\Models\\UgOrderRecords"]);
        $builder->join("App\\Models\\UgOrderErps", "e.order_no = a.order_no", "e", "left");
        $builder->orderBy('a.id desc');

        if ($struct->orderNo) {
            $builder->where("a.order_no = '".$struct->orderNo."'");
        }

        if ($struct->isDirect != '') {
            $builder->andWhere("is_direct = '".$struct->isDirect."'");
        }

        if ($struct->mobile) {
            $builder->andWhere("member_mobile = '".$struct->mobile."'");
        }

        if ($struct->equityNo) {
            $equity = $this->equityService->getDetailByEquityNo($struct->equityNo);
            if ($equity->id) {
                $builder->andWhere("account_id = ".$equity->id);
                $builder->join("App\\Models\\UgOrderClaims", "c.order_no = a.order_no", "c", "left");
            }
        }

        if ($struct->partnerId) {
            $builder->andWhere("partner_id = ".$struct->partnerId);
        }

        if ($struct->storeId) {
            $builder->andWhere("store_id = ".$struct->storeId);
        }

        if ($struct->erpSn) {
            $builder->andWhere("erp_sn = '".$struct->erpSn."'");
        }

        if ($struct->productId) {
            $builder->andWhere("service_id = '".$struct->productId."'");
        }

        $orders = $this->withQueryPaging($builder, $struct->page, $struct->limit);
        return $orders;
    }

    /**
     * 获取订单详情
     * @param $orderId
     * @return array
     */
    public function detail($orderId)
    {
        $order = UgOrderRecords::findFirst($orderId);

        $equity = $this->equityService->getDetailByEquityId($order->orderClaim->account_id);

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
            'equityNo' => $equity->equityNo,
            'items' => $this->getItems($order),
            'onlineDetail' => [
                'waterNo' => $order->shopOrder->water_no,
                'comment' => $order->shopOrder->comment,
                'statusText' => $order->shopOrder?$order->shopOrder->getStatusText():'',
                'consigne' => $order->shopOrder->consigne,
                'consigneAddress' => $order->shopOrder->consigne_address,
                'consigneMobile' => $order->shopOrder->consigne_mobile,
                'expressNo' => $order->shopOrder->express->express_no,
                'expressCompany' => $order->shopOrder->express->express_company
            ],
            'poolRecords' => $this->getPoolRecords($order)
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

    public function getPoolRecords(UgOrderRecords $order)
    {
        $pools = $order->pools;

        $data = [];
        if (count($pools)) {
            foreach ($pools as $pool) {
                $data[] = [
                    'id' => $pool->id,
                    'orderNo' => $pool->order_no,
                    'originAmount' => $pool->origin_fund,
                    'incomeAmount' => $pool->type != 1?$pool->op_fund:'0.00',
                    'expendAmount' => $pool->type == 1?$pool->op_fund:'0.00',
                    'finalAmount' => $pool->final_fund
                ];
            }
        }

        return $data;
    }

    public function getList(ListStruct $struct)
    {
        $builder = new Builder();
        $builder->columns('a.id as orderId,a.order_no as orderNo,show_amount as totalAmount,a.created_at as createdAt,partner_name as partnerName,store_name as storeName,assistant_name as assistantName,shop_id as isOnline,service_name as serviceName,sale_amount as saleAmount,checked_at as checkedAt,a.status,e.erp_sn as erpSn,e.erp_img as erpImg');
        $builder->from(["a" => "App\\Models\\UgOrderRecords"]);
        $builder->join("App\\Models\\UgOrderErps", "e.order_no = a.order_no", "e", "left");
        $builder->orderBy('a.id desc');

        if ($struct->orderNo) {
            $builder->where("a.order_no = '".$struct->orderNo."'");
        }

        if ($struct->isDirect != '') {
            $builder->andWhere("is_direct = '".$struct->isDirect."'");
        }

        if ($struct->mobile) {
            $builder->andWhere("member_mobile = '".$struct->mobile."'");
        }

        if ($struct->equityNo) {
            $equity = $this->equityService->getDetailByEquityNo($struct->equityNo);
            if ($equity->id) {
                $builder->andWhere("account_id = ".$equity->id);
                $builder->join("App\\Models\\UgOrderClaims", "c.order_no = a.order_no", "c", "left");
            }
        }

        if ($struct->partnerId) {
            $builder->andWhere("partner_id = ".$struct->partnerId);
        }

        if ($struct->storeId) {
            $builder->andWhere("store_id = ".$struct->storeId);
        }

        if ($struct->erpSn) {
            $builder->andWhere("erp_sn = '".$struct->erpSn."'");
        }

        if ($struct->productId) {
            $builder->andWhere("service_id = '".$struct->productId."'");
        }
    }

    /**
     * 导出excel
     * @param ListStruct $struct
     */
    public function excelExport(ListStruct $struct)
    {
        $orders = $this->getList($struct);

        if (count($orders)) {
            $objPHPExcel = new \PHPExcel();                     //实例化一个PHPExcel()对象
            $objSheet = $objPHPExcel->getActiveSheet();        //选取当前的sheet对象
            $objSheet->setTitle('订单');                      //对当前sheet对象命名
            $objSheet->setCellValue('A1', '药联订单号');
            $objSheet->setCellValue('B1', 'ERP销售单号');
            $objSheet->setCellValue('C1', '连锁名称');
            $objSheet->setCellValue('D1', '门店名称');
            $objSheet->setCellValue('E1', '产品名称');
            $objSheet->setCellValue('F1', '药联订单创建时间');
            $objSheet->setCellValue('G1', 'ERP销售时间');
            $objSheet->setCellValue('H1', '审核时间');
            $objSheet->setCellValue('I1', '审核状态');
            $objSheet->setCellValue('J1', '资金池扣款状态');
            $k = 2;
            foreach ($orders as $order) {
                $objSheet->setCellValue('A'.$k, $order->orderNo);
                $objSheet->setCellValue('B'.$k, $order->erpSn);
                $objSheet->setCellValue('C'.$k, $order->partnerName);
                $objSheet->setCellValue('D'.$k, $order->storeName);
                $objSheet->setCellValue('E'.$k, $order->serviceName);
                $objSheet->setCellValue('F'.$k, $order->createdAt);
                $objSheet->setCellValue('G'.$k, $order->checkedAt);
                $objSheet->setCellValue('H'.$k, $order->statusText);
                $objSheet->setCellValue('I'.$k, $order->status == 2 && $order->pools?'已扣除':'未扣除');
                $k++;
            }

            $write = new \PHPExcel_Writer_Excel5($objPHPExcel);
            header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
            header("Content-Type:application/force-download");
            header("Content-Type:application/vnd.ms-execl");
            header("Content-Type:application/octet-stream");
            header("Content-Type:application/download");;
            header('Content-Disposition:attachment;filename="'.time().'.xls"');
            header("Content-Transfer-Encoding:binary");
            $write->save('php://output');
        }
    }
}