<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:21
 */

namespace App\Services;

use App\Errors\Error;
use App\Services\Abstracts\Service;
use Uniondrug\Packet\Json;

/**
 * 沟通记录Service
 * Class UserService
 * @package App\Services
 */
class UserService extends Service
{
    /**
     * 用户登陆
     * @param $struct
     * @return \Uniondrug\Service\ClientResponseInterface
     * @throws Error
     */
    public function login($struct)
    {
        $member = $this->serviceSdk->user->memberLogin([
            'mobile' => $struct->mobile,
            'password' => $struct->password
        ]);

        if ($member->hasError()){
            throw new Error($member->getErrno(), "账号或密码错误");
        }

        $worker = $this->serviceSdk->merchant->login([
            'memberId' => $member->getData()->memberId
        ]);

        if ($worker->hasError()){
            throw new Error($worker->getErrno(), "账号不存在");
        }

        return $worker->getData();
    }

    /**
     *
     */
    public function logout()
    {
        $token = $this->tokenAuthService->getTokenFromRequest($this->request);
        //1. 删除token
        $this->tokenAuthService->revokeToken($token);

        //2. 删除redis
        $this->redis->delete($token);
    }

    /**
     * 生成token
     * @param $user
     * @return array
     */
    public function makeToken($user)
    {
        $token = $this->tokenAuthService->issueToken($user->workerId, $user->name);

        $data = [
            'token' => $token,
            'workerId' => $user->workerId,
            'workerName' => $user->name,
            'workerRole' => $user->roleName,
            'memberId' => $user->memberId,
            'mobile' => $user->mobile,
            'merchantId' => $user->merchantId,
            'merchantName' => $user->merchant->name,
            'merchantLogo' => $user->merchant->logo
        ];

        $this->redis->set($token, Json::encode($data));

        return $data;
    }

    /**
     * 根据token获取用户信息
     * @return array
     */
    public function getUser()
    {
        $token = $this->tokenAuthService->getTokenFromRequest($this->request);

        $data = $this->redis->get($token);

        return Json::decode($data);
    }

    /**
     * 根据token获取用户信息
     * @return array
     */
    public function getUsers()
    {
        $token = $this->serviceSdk->merchant->getMerchantList();

        $data = $this->redis->get($token);

        return Json::decode($data);
    }

    /**
     * 获取员工权限菜单
     * @return mixed
     */
    public function getMenu($user)
    {
        $json = '{
                    "app": {
                        "name": "客服后台",
                        "description": ""
                    },
                    "user": {
                        "name": "客服后台",
                        "avatar": "./assets/img/zorro.svg",
                        "email": "cipchk@qq.com"
                    },
                    "menu": [
                        {
                            "text": "",
                            "hideInBreadcrumb": true,
                            "translate": "",
                            "group": false,
                            "children": [
                                {
                                    "text": "首页",
                                    "translate": "dashboard",
                                    "link": "/dashboard/v1",
                                    "icon": "icon-speedometer"
                                },
                                {
                                    "text": "工作台",
                                    "translate": "工作台",
                                    "link": "/workbench",
                                    "icon": "icon-speedometer"
                                }
                            ]
                        }
                    ]
                }';
        return json_decode($json, 1);
    }
}