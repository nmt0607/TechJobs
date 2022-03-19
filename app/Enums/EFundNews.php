<?php


namespace App\Enums;


class EFundNews {
    const TOP = 0;
    const FOOTER = 1;

    public static function getListData()
    {
        return [
            1 => "Báo cáo NAV",
            2 => "Báo cáo hoạt động",
            3 => "Công bố thông tin",
            5 => "Tin tức quỹ",
            6 => "Quan hệ cổ đông",
            7 => "Báo cáo nhà đầu tư",
        ];
    }

    public static function typeToName($key)
    {
        $data = static::getListData();
        return $data[$key] ?? '';
    }
}
