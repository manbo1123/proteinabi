<?php

namespace App\Enums\Product;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Flavor extends Enum
{
    const Unknown   = 0;
    const Fruits    = 1;
    const Sweets    = 2;
    const NonFlavor = 3;
    const Other     = 10;

    public static function getDescription($value): string {
        switch ($value){
            case self::Unknown:
                return '不明';
                brake;
            case self::Fruits:
                return 'フルーツ系';
                brake;
            case self::Sweets:
                return 'スイーツ系';
                brake;
            case self::NonFlavor:
                return 'ノンフレーバー';
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
            case 'フルーツ系':
                return 1;
            case 'スイーツ系':
                return 2;
            case 'ノンフレーバー':
                return 3;
            case 'その他':
                return 10;
            default:
                return self::getValue($key);
        }
    }
}
