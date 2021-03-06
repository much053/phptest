<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see       https://www.github.com/janhuang
 * @see       https://fastdlabs.com
 */

namespace Uniondrug\Server\Servitization\Server;

use swoole_server;
use Uniondrug\Server\Application;
use Uniondrug\Server\Servitization\OnTaskTrait;
use Uniondrug\Swoole\Server\TCP;

/**
 * Class MonitorStatusServer.
 */
class ManagerServer extends TCP
{
    use OnTaskTrait;

    /**
     * @param swoole_server $server
     * @param               $fd
     * @param               $from_id
     */
    public function doConnect(swoole_server $server, $fd, $from_id)
    {
        $server->send($fd, sprintf('server: %s %s', app()->getName(), Application::VERSION) . PHP_EOL);
    }

    /**
     * @param swoole_server $server
     * @param               $fd
     * @param               $data
     * @param               $from_id
     *
     * @return mixed
     */
    public function doWork(swoole_server $server, $fd, $data, $from_id)
    {
        switch (trim($data)) {
            case 'quit':
                $server->send($fd, 'connection closed');
                $server->close($fd);

                break;
            case 'reload':
                $this->getSwoole()->reload();

                break;
            case 'status':
            default:
                $info = $server->stats();
                $status = '';
                foreach ($info as $key => $value) {
                    $status .= '[' . date('Y-m-d H:i:s') . ']: ' . $key . ': ' . $value . PHP_EOL;
                }
                $server->send($fd, $status);

                break;
        }
    }
}
