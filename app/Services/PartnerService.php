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
use App\Services\Abstracts\Service;

/**
 * 订单服务类
 * Class OrderService
 * @package App\Services
 */
class PartnerService extends Service
{
    /**
     * @return mixed
     * @throws Error
     */
    public function getList()
    {
        $url = $this->config->path('host.admin_host').'/api/partners';

        try {
            $res = $this->httpClient->get($url);
        } catch (\Exception $e) {
            throw new Error(Code::FAILURE_CREATE, '网络繁忙，请稍后重试');
        }

        $data = json_decode($res->getBody()->__toString());

        foreach ($data->data as $partner) {
            $return[] = [
                'partnerId' => $partner->id,
                'commonName' => $partner->name,
                'logo' => $partner->logo
            ];
        }
        return $return;
    }


    /**
     * 获取连锁旗下所有门店
     * @param $partnerId
     * @return mixed
     * @throws Error
     */
    public function getStores($partnerId)
    {
        $url = $this->config->path('host.admin_host').'/api/partners/store';

        $options = [
            'query' => [
                'partnerId' => $partnerId
            ]
        ];

        try {
            $res = $this->httpClient->get($url, $options);
        } catch (\Exception $e) {
            throw new Error(Code::FAILURE_CREATE, '网络繁忙，请稍后重试');
        }

        $data = json_decode($res->getBody()->__toString());

        $return = [];
        if ($data->data) {
            foreach ($data->data as $partner) {
                $return[] = [
                    'storeId' => $partner->id,
                    'commonName' => $partner->name
                ];
            }
        }

        return $return;
    }
}