<?php
/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午3:21
 */

namespace App\Services;

use App\Errors\Code;
use App\Errors\Error;
use App\Models\Communicates;
use App\Services\Abstracts\Service;
use Phalcon\Mvc\Model\Query\Builder;

/**
 * 沟通记录Service
 * Class CommunicateService
 * @package App\Services
 */
class CommunicateService extends Service
{
    /**
     * 获取沟通记录列表
     * @param $struct
     * @return \stdClass
     */
    public function getList($struct)
    {
        $builder = new Builder();
        $builder->from(["a" => "App\\Models\\Communicates"]);
        $builder->orderBy('communicateId desc');

        return $this->withQueryPaging($builder, $struct->page, $struct->limit);
    }

    /**
     * 添加沟通记录
     * @param $struct
     */
    public function add($struct)
    {
        $this->db->begin();
        try{
            $worker = $this->userService->getUser();

            $record = new Communicates();
            $record->fullName = $struct->fullName;
            $record->workerId = $worker->workerId;
            $record->workerName = $worker->workerName;
            $record->mobile = $struct->mobile;
            $record->partnerId = $struct->partnerId;
            $record->orderNo = $struct->orderNo;
            $record->storeId = $struct->storeId;
            $record->content = $struct->content;
            $record->isFinish = $struct->isFinish;
            $record->isComplain = $struct->isComplain;
            $record->save();

            $this->db->commit();
        } catch (\Exception $e) {
            $this->db->rollback();
            throw new Error(Code::FAILURE_CREATE, $e->getMessage());
        }
    }

    /**
     * 获取沟通记录详情
     * @param $communicateId
     * @return mixed
     * @throws Error
     */
    public function detail($communicateId)
    {
        //查找沟通记录
        $communicate = Communicates::findFirst($communicateId);

        if (!$communicate) {
            throw new Error(Code::FAILURE_CREATE, "暂无记录");
        }

        $data = $communicate->toArray();

        //查找此人相同订单的沟通记录
        $records = Communicates::find([
            'mobile = :mobile: and orderNo = :orderNo:',
            'bind' => [
                'mobile' => $communicate->mobile,
                'orderNo' => $communicate->orderNo
            ]
        ]);

        $data['records'] = $records;

        return $data;
    }

    public function countStatistic($struct)
    {
        return [
            'count' => $this->countAll($struct),
            'countFinish' => $this->countFinish($struct),
            'countUnfinish' => $this->countUnfinish($struct)
        ];
    }

    public function countAll($struct)
    {
        $cond = $this->_get_cond($struct);

        //所有已出来的记录
        return Communicates::count([
            implode(' and ', $cond)
        ]);
    }

    public function countFinish($struct)
    {
        $cond = $this->_get_cond($struct);

        $cond[] = "isFinish = ".Communicates::FINISH;

        //所有已出来的记录
        return Communicates::count([
            implode(' and ', $cond)
        ]);
    }

    public function countUnfinish($struct)
    {
        $cond = $this->_get_cond($struct);

        $cond[] = "isFinish = ".Communicates::UNFINISH;

        //所有已出来的记录
        return Communicates::count([
            implode(' and ', $cond)
        ]);
    }

    private function _get_cond($struct)
    {
        $cond = [];

        if ($struct->workerId) {
            $cond[] = "workerId = ".$struct->workerId;
        }

        if ($struct->startDate) {
            $cond[] = "createdAt >= '".$struct->startDate."'";
        }

        if ($struct->endDate) {
            $cond[] = "createdAt <= '".$struct->endDate."'";
        }

        return $cond;
    }
}