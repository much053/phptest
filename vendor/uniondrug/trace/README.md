# Trace client for uniondrug/framework

分布式调用链跟踪客户端

## 安装

```shell
$ cd project-home
$ composer require uniondrug/trace
$ cp vendor/uniondrug/trace/trace.php config/
```

修改 `app.php` 配置文件，注入服务，服务名称：`traceClient`。

```php
return [
    'default' => [
        ......
        'providers'           => [
            ......
            \Uniondrug\Trace\TraceClientServiceProvider::class,
        ],
    ],
];
```

## 配置

配置文件在 `trace.php` 中，

```php
<?php
/**
 * Trace中心的配置文件。
 *
 * service: HTTP方式的采集地址
 * timeout: 连接超时时间，单位 秒，默认 30
 */
return [
    'default' => [
        'service' => 'http://ip:port',
        'timeout' => 30,
    ],
];
```

## 使用

trace默认在TraceMiddleware和HTTPClient中使用，无需单独使用。
