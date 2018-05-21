<?php

/**
 * Created by PhpStorm.
 * User: qishengqiang
 * Date: 2018/5/3
 * Time: 下午4:46
 */
namespace App\Structs\Requests\Communicate;

use Uniondrug\Structs\Struct;

/**
 * @package App\Structs
 */
class AddStruct extends Struct
{
    /**
     * 用户姓名
     * @var string
     * @Validator(type=string,required)
     */
    public $full_name;

    /**
     * 联系方式
     * @var string
     * @Validator(type=string,required)
     */
    public $mobile;

    /**
     * 连锁ID
     * @var int
     * @Validator(type=int)
     */
    public $partner_id;

    /**
     * 门店ID
     * @var int
     * @Validator(type=int)
     */
    public $store_id;

    /**
     * 沟通记录
     * @var string
     * @Validator(type=string,required)
     */
    public $content;

    /**
     * 是否为投诉意见
     * @var int
     * @Validator(type=int)
     */
    public $is_complain;


    /**
     * 处理结果
     * @var string
     * @Validator(type=string)
     */
    public $result;
}