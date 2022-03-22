<?php


namespace App\Enums;


class EPriorityType {
    const low = 1;
    const normal = 2;
    const high = 3;
    const emergency = 4;
    public static function getEPriorityType(){
        return [
            1 => 'Thấp',
            2 => 'Trung bình',
            3 => 'Cao',
            4 => 'Khẩn cấp',
        ];
    }
}
