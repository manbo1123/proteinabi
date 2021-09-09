<?php

namespace App\Enums\Comment;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Status extends Enum
{
    const Unsaved     = 0;
    const Unpublished = 1;
    const Published   = 2;

    public static function getDescription($value): string {
        switch ($value){
            case self::Unsaved:
                return '未保存';
                brake;
            case self::Unpublished:
                return '未公開';
                brake;
            case self::Published:
                return '公開済';
                brake;
            default:
                return self::getKey($value);
        }
    }

    public static function getValue(string $key) {
        switch ($key) {
            case '未保存':
                return 0;
            case '未公開':
                return 1;
            case '公開済':
                return 2;
            default:
                return self::getValue($key);
        }
    }
}
