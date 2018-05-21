<?php
/**
 * Created by PhpStorm.
 * User: luzhouyu
 * Date: 17/2/23
 * Time: 下午10:26
 */

namespace App\Providers;

use Phalcon\Di\ServiceProviderInterface;

class DbsServiceProvider implements ServiceProviderInterface
{
    public function register(\Phalcon\DiInterface $di)
    {
        $dbs = $di->getConfig()->path('dbs');

        foreach ($dbs as $key => $value) {
            $di->setShared(
                $key,
                function () use ($value) {
                    $config = (array)$value;
                    $connection =  new \Phalcon\Db\Adapter\Pdo\Mysql($config);
                    return $connection;
                }
            );
        }
    }
}