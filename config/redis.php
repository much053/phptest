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
            'prefix'     => '_SKETCH_',
            'host'       => '120.26.161.148',
            'port'       => 6379,
            'auth'       => 'juyin@2017',
            'persistent' => false,
            'index'      => 0,
        ],
    ],
    'testing' => [
        'options' => [
            'prefix'     => '_SKETCH_',
            'host'       => 'r-bp1bce11bbd535a4.redis.rds.aliyuncs.com',
            'port'       => 6379,
            'auth'       => 'Juyin2017',
            'persistent' => false,
            'index'      => 0,
        ],
    ]
];