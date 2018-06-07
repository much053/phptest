<?php
/**
 * 数据库配置。每个项目要求最多只连接一个数据库。
 *
 * adapter: 适配器，当前只使用mysql
 * debug: 调试模式开关，打开时，会在日志目录记录数据库详细日志；
 * useSlave: 是否读写分离。打开时，需要同时设置 slaveConnection 的内容。
 * connection: 连接参数。
 */
return [
    'default'    => [
        'adapter'         => 'mysql',
        'debug'           => true,
        'useSlave'        => false,
        'interval'        => 20, // Swoole 容器运行时，数据库心跳保持间隔
        'connection'      => [
            'host'     => '582959f06c18d.sh.cdb.myqcloud.com',
            'port'     => 3712,
            'username' => 'develop',
            'password' => 'develop123',
            'dbname'   => 'uniondrug',
            'charset'  => 'utf8',
        ],
        'slaveConnection' => [
            'host'     => '582959f06c18d.sh.cdb.myqcloud.com',
            'port'     => 3712,
            'username' => 'develop',
            'password' => 'develop123',
            'dbname'   => 'uniondrug',
            'charset'  => 'utf8',
        ],
    ],
    'testing'    => [
        'adapter'         => 'mysql',
        'debug'           => true,
        'useSlave'        => false,
        'interval'        => 20, // Swoole 容器运行时，数据库心跳保持间隔
        'connection'      => [
            'host'     => '582959f06c18d.sh.cdb.myqcloud.com',
            'port'     => 3712,
            'username' => 'develop',
            'password' => 'develop123',
            'dbname'   => 'uniondrug',
            'charset'  => 'utf8',
        ],
        'slaveConnection' => [
            'host'     => '582959f06c18d.sh.cdb.myqcloud.com',
            'port'     => 3712,
            'username' => 'develop',
            'password' => 'develop123',
            'dbname'   => 'uniondrug',
            'charset'  => 'utf8',
        ],
    ],
    'production' => [
        'adapter'         => 'mysql',
        'debug'           => false,
        'useSlave'        => false,
        'interval'        => 20, // Swoole 容器运行时，数据库心跳保持间隔
        'connection'      => [
            'host'     => 'rm-bp1nq6ibu5s4noqbo.mysql.rds.aliyuncs.com',
            'port'     => 3306,
            'username' => 'uniondrug',
            'password' => 'juyin@2017',
            'dbname'   => 'uniondrug',
            'charset'  => 'utf8',
        ],
        'slaveConnection' => [
            'host'     => 'localhost',
            'port'     => 3306,
            'username' => 'root',
            'password' => '',
            'dbname'   => 'test',
            'charset'  => 'utf8',
        ],
    ],
];

