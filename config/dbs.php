<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/4
 * Time: 下午6:55
 */
return [
    "default" => [
        "db1"  => [
            'adapter'  => 'Mysql',
            'host'     => '582959f06c18d.sh.cdb.myqcloud.com',
            'port'     => '3712',
            'username' => 'develop',
            'password' => 'develop123',
            'dbname'   => 'uniondrug_partner_rc',
            'charset'  => 'utf8',
        ],
        "db2"  => [
            'adapter'  => 'Mysql',
            'host'     => '582959f06c18d.sh.cdb.myqcloud.com',
            'port'     => '3712',
            'username' => 'develop',
            'password' => 'develop123',
            'dbname'   => 'cn_turboradio_backend_dev_agent',
            'charset'  => 'utf8',
        ]
    ],
    "testing" => [
        "db1"  => [
            'adapter'  => 'Mysql',
            'host'     => '582959f06c18d.sh.cdb.myqcloud.com',
            'port'     => '3712',
            'username' => 'develop',
            'password' => 'develop123',
            'dbname'   => 'uniondrug_partner_rc',
            'charset'  => 'utf8',
        ],
        "db2"  => [
            'adapter'  => 'Mysql',
            'host'     => '582959f06c18d.sh.cdb.myqcloud.com',
            'port'     => '3712',
            'username' => 'develop',
            'password' => 'develop123',
            'dbname'   => 'cn_turboradio_backend_dev_agent',
            'charset'  => 'utf8',
        ]
    ],
    "production" => [
        "db1" => [
            'adapter' => 'Mysql',
            'host' => 'rm-bp1nq6ibu5s4noqbo.mysql.rds.aliyuncs.com',
            'port' => '3306',
            'username' => 'uniondrug',
            'password' => 'juyin@2017',
            'dbname' => 'uniondrug_partner',
            'charset' => 'utf8',
        ],
        "db2" => [
            'adapter' => 'Mysql',
            'host' => 'rm-bp1nq6ibu5s4noqbo.mysql.rds.aliyuncs.com',
            'port' => '3306',
            'username' => 'uniondrug',
            'password' => 'juyin@2017',
            'dbname' => 'cn_uniondrug_backend_agent',
            'charset' => 'utf8',
        ]
    ]
];