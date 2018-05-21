<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Uniondrug\Packet;

use swoole_serialize;

/**
 * Class Swoole
 *
 * @package FastD\Packet
 */
class Swoole implements PacketInterface
{
    /**
     * @param $data
     *
     * @return mixed
     */
    public static function encode($data)
    {
        return swoole_serialize::pack($data);
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public static function decode($data)
    {
        return swoole_serialize::unpack($data);
    }
}