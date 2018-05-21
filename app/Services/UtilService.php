<?php
/**
 * UtilService.php
 *
 */
namespace App\Services;

use App\Services\Abstracts\Service;

class UtilService extends Service
{
    /**
     * 获取两个时间之间的月份差
     * @param $date1
     * @param $date2
     * @return int
     */
    public static function getMonthNum($date1, $date2 = '')
    {
        $date1_stamp = date_create($date1);
        $date2_stamp = date_create($date2?:date('Y-m-d'));
        $diff = date_diff($date2_stamp, $date1_stamp);
        return $diff->y * 12 + $diff->m;
    }


    /**
     * 二维数组根据字段进行排序
     * @params array $array 需要排序的数组
     * @params string $field 排序的字段
     * @params string $sort 排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
     */
    function arraySequence($array, $field, $sort = 'SORT_DESC')
    {
        $arrSort = array();
        foreach ($array as $uniqid => $row) {
            foreach ($row as $key => $value) {
                $arrSort[$key][$uniqid] = $value;
            }
        }
        array_multisort($arrSort[$field], constant($sort), $array);
        return $array;
    }
}
