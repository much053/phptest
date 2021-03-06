<?php
/**
 * Redis配置文件。
 *
 * options: Redis服务的配置参数，参考如下：
 * <code>
 *        'options'  => [
 *            'host' => 'localhost',
 *            'port' => 6379,
 *            'auth' => 'foobared',
 *            'persistent' => false, // 持久化连接，默认不持久化
 *            'index' => 0,
 *        ],
 * </code>
 */
return [
    'default' => [
        'options' => [
            'prefix'     => '_AGENT_BACKEND_',
            'host'       => '192.168.3.193',
            'port'       => 6379,
            'auth'       => 'uniondrug@123',
            'persistent' => false,
            'index'      => 0,
        ],
    ],
    'production' => [
        'options' => [
            'prefix'     => '_AGENT_BACKEND_',
            'host'       => 'r-bp1bce11bbd535a4.redis.rds.aliyuncs.com',
            'port'       => 6379,
            'auth'       => 'Juyin2017',
            'persistent' => false,
            'index'      => 0,
        ],
    ]
];