<?php


namespace App\Enums;


class EMenuConfigType {
    const TOP = 0;
    const FOOTER = 1;

    public static function valueToName($value)
    {
        switch ($value) {
            case self::TOP:
                $result = 'Top';
                break;
            case self::FOOTER:
                $result = 'Footer';
                break;
            default:
                $result = $value;
                break;
        }
        return $result;
    }
}
