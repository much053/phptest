# Uniondrug HTTP Server and Client

> THANKS：本模块来自 [FastD](https://github.com/fastdlabs/http)

简单的 Http 协议组件, 用于解析 Http 请求信息, 实现 PSR-7 标准, **支持 Swoole 扩展**.

以上库可以满足大部分 HTTP 请求处理相关工作, 支持 Swoole 处理, 具体请看项目[Swoole](https://github.com/uniondrug/swoole)。

## 要求

* php >= 5.6

## 安装

```
composer require "uniondrug/http" -vvv
```

## 文档

[文档](docs/readme.md)

## 使用

HTTP 组件封装了常用的服务端解释,客户端请求,并且友好集成 Swoole Http Server 解析，实现PSR-7。

##### 获取 pathinfo

```php
use Uniondrug\Http\ServerRequest;

$request = ServerRequest::createServerRequestFromGlobals();

$request->getUri()->getPath();
```

##### Swoole Http 服务器

```php
$http = new swoole_http_server("127.0.0.1", 9501);

$http->on('request', function ($request, $response) {
    $server = SwooleServerRequest::createServerRequestFromSwoole($request);
    $response->end($server->getUri()->getPath());
});

$http->start();
```

##### cURL 请求

Request 对象内部封装了 cURL 请求, 可以直接通过方法调用

```php
$request = new Request('GET', 'https://api.github.com/');

$request->setReferrer('http://example.com/');

$response = $request->send(); // Uniondrug\Http\Response
```

响应内容会通过 `Response` 对象返回。

## License MIT
