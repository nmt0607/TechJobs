<?php


namespace App\Enums;


class EMasterData {
    const TOP = 0;
    const FOOTER = 1;
    const CONTENT_TO_ADVISE = 14;
    const RATE_LEVEL_RISK = 25;

    public static function getListData()
    {
        return [
            1 => 'Banner trang chủ',
            2 => 'Nhu cầu đầu tư trang chủ',
            3 => 'Các bước đầu tư trang chủ',
            4 => 'Liên kết công ty',
            5 => 'Địa chỉ công ty',
            6 => 'Tel',
            7 => 'Fax',
            8 => 'Cơ cấu danh mục tham khảo',
            9 => 'Trách nhiệm xã hội (tuyển dụng)',
            10 => 'Môi trường làm việc MB',
            11 => 'Ủy thác đầu tư tổ chức',
            12 => 'Ủy thác đầu tư cá nhân (là gì)',
            13 => 'Ủy thác đầu tư cá nhân (tại sao)',
            14 => 'Nội dung cần tư vấn',
            15 => 'Kiến thức cơ bản về quỹ',
            16 => 'Thuật ngữ đầu tư',
            17 => 'Kiến thức cơ bản về đầu tư',
            18 => 'Khen thưởng',
            19 => 'Về Mb captical',
            20 => 'Các mốc quan trọng',
            21 => 'Popup trang chủ',
            22 => 'Bảng tư vấn đầu tư',
            23 => 'Danh sách tư vấn đầu tư cho mobile',
            24 => 'Giá trị lợi nhuận kỳ vọng',
            25 => 'Mức độ rủi ro( Khảo sát)',
        ];
    }

    public static function valueToName($key)
    {
        $data = static::getListData();
        return $data[$key] ?? '';
    }
}
