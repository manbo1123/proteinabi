<?php

namespace App\Enums\Product;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Condition extends Enum
{
    const Unknown = 0;
    const Powder  = 1;
    const Liquid  = 2;
    const Solid   = 3;
    const Tablet  = 4;
    const Other   = 5;

    public static function getDescription($value): string {
        switch ($value){
            case self::Unknown:
                return '不明';
                brake;
            case self::Powder:
                return '粉末';
                brake;
            case self::Liquid:
                return '液体';
                brake;
            case self::Solid:
                return '固体';
                brake;
            case self::Tablet:
                return 'タブレット';
                brake;
            case self::Other:
                return 'その他';
                brake;
            default:
                return self::getKey($value);
        }
    }

    public static function getValue(string $key) {
        switch ($key) {
            case '不明':
                return 0;
            case '粉末':
                return 1;
            case '液体':
                return 2;
            case '固体':
                return 3;
            case 'タブレット':
                return 4;
            case 'その他':
                return 5;
            default:
                return self::getValue($key);
        }
    }
}
