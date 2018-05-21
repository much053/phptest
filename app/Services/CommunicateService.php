<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:21
 */

namespace App\Services;

use App\Services\Abstracts\Service;

/**
 * 沟通记录Service
 * Class CommunicateService
 * @package App\Services
 */
class CommunicateService extends Service
{
    /**
     * 添加沟通记录
     * @param $struct
     */
    public function add($struct)
    {
        $this->db->begin();
        try{
            $record = new

            $this->db->commit();
        } catch (\Exception $e) {
            $this->db->rollback();
        }
    }
}