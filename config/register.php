<?php
/**
 * 服务注册中心的配置文件。
 *
 * timeout: 连接超时时间，单位 秒，默认 30
 * service: 注册中心地址。可以是：tcp://ip:port or http://ip:port
 */
return [
    'default'    => [
        'timeout' => 30,
        'service' => 'http://ns.module.test.turboradio.cn:8082',
    ],
    'production' => [
        'timeout' => 30,
        'service' => 'http://ns.module.uniondrug.cn:8082',
    ],
];
