<?php


namespace App\Enums;


class ESurveyType {
    const email = 1;
    const form = 2;
    const popup = 3;
    public function getESurveyType(){
        return [
            1 => 'Email',
            2 => 'Biểu mẫu',
            3 => 'Popup',
        ];
    }
}
