<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 16/5/27
 * Time: 下午10:41
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace Uniondrug\Packet;

use Uniondrug\Packet\Exceptions\PacketException;

/**
 * Class Json
 *
 * @package FastD\Packet
 */
class Json implements PacketInterface
{
    const SALT_START = 5;
    const SALT_LENGTH = 10;

    /**
     * @param     $data
     *
     * @param int $options
     * @param int $depth
     *
     * @return string
     * @throws \Uniondrug\Packet\Exceptions\PacketException
     */
    public static function encode($data, $options = 0, $depth = 512)
    {
        if (!is_array($data)) {
            throw new PacketException('The packet data is invalid. Must be a array.');
        }

        return json_encode($data, $options, $depth);
    }

    /**
     * @param      $data
     * @param bool $assoc
     *
     * @return array
     * @throws \Uniondrug\Packet\Exceptions\PacketException
     */
    public static function decode($data, $assoc = false)
    {
        $json = json_decode($data, $assoc);
        if (json_last_error()) {
            throw new PacketException(json_last_error_msg());
        }

        return $json;
    }
}