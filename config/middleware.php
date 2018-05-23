<?php
/**
 * middlewares.php
 *
 */
return [
    'default' => [
        // 应用定义的中间件
        'middlewares' => [
            // 注册名为token的中间件
            'token' => \Uniondrug\TokenAuthMiddleware\TokenAuthMiddleware::class,
        ],

        // 全局中间件，会应用在全部路由，优先级在应用定义之前
        'global'      => [
            'cors', 'token', 'cache', 'favicon', 'trace',
        ],

        // 全局中间件，会应用在全部路由，优先级在应用定义之后
        'globalAfter' => [
            'powered',
        ],

        // Token中间件的参数设置
        'token' => [
            // 白名单，这个列表内的地址不需要认证，通常放登录接口等地址
            'whitelist' => "/\/users\/(login|weixin|bind|openid|uuid|qrcode|sms|socket)$/i",
            'ttl' => 7 * 86400,
            // 有效期7天，连续7天不登录将失效
        ],

        // 以下是中间件用到的配置参数
        'cache'       => [
            'lifetime' => 60,
        ],

        'powered_by' => 'Uinondrug',
    ],
];