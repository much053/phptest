<?php
/**
 * 框架级Validator
 *
 * @author wsfuyibing <websearch@163.com>
 * @date   2018-01-05
 */

namespace Uniondrug\Validation\Validators;

use Phalcon\Validation;
use Phalcon\Validation\Message;
use Uniondrug\Validation\Structs\TimeParseStruct;
use Uniondrug\Validation\Validator;

/**
 * 验证时间格式
 * <code>
 * $validation = new Validation();                  // 创建Validation实例
 * $attribute = 'field';                            // 参数名称
 * $options = [                                     // 验证选项
 *     'required' => 'true',                        // 是否必须
 *     'empty' => 'false',                          // 是否允许为空
 *     'default' => '08:00',                        // 当不传字段时赋默认值
 *     'min' => '08:00',                            // 最小时间
 *     'max' => '21:30'                             // 最大时间
 * ];
 * $validator = new TimeValidator($options);
 * $validation->add($attribute, $validator);
 * $validation->validate();
 * </code>
 *
 * @package Pails\Validators
 */
class TimeValidator extends Validator
{
    /**
     * 执行验证
     *
     * @param Validation $validation Validation对象
     * @param string     $attribute  待验证的字段/参数名
     *
     * @return bool
     */
    public function validate(\Phalcon\Validation $validation, $attribute)
    {
        // 1. 必须和非空验证
        if (!$this->validateRequired($validation, $attribute) || !$this->validateEmpty($validation, $attribute)) {
            return false;
        }

        // 2. 格式检查
        $value = $validation->getValue($attribute);

        // 3. 允许为空(当禁止为空时已由validateEmpty()过滤)
        if ($value === '') {
            return true;
        }

        // 4. 时间格式检查
        $parsed = new TimeParseStruct($value);
        if (!$parsed->parsed) {
            $validation->appendMessage(new Message("参数'{$attribute}'的值不是有效的时间", $attribute));

            return false;
        }

        // 5. 最小值
        $minValue = $this->getOption('min');
        if ($minValue != null) {
            $minParsed = new TimeParseStruct($minValue);
            if ($minParsed->parsed && $parsed->number < $minParsed->number) {
                $validation->appendMessage(new Message("参数'{$attribute}'的值不能小于'{$minValue}'", $attribute));

                return false;
            }
        }

        // 6. 最大时间
        $maxValue = $this->getOption('max');
        if ($maxValue != null) {
            $maxParsed = new TimeParseStruct($maxValue);
            if ($maxParsed->parsed && $parsed->number > $maxParsed->number) {
                $validation->appendMessage(new Message("参数'{$attribute}'的值不能大于'{$maxValue}'", $attribute));

                return false;
            }
        }

        // 7. 时间正确
        return true;
    }
}
