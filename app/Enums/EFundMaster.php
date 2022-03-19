<?php


namespace App\Enums;


class EFundMaster
{
    const TOP = 0;
    const FOOTER = 1;

    public static function getList()
    {
        return [
            1 => [
                1 => 'Tại sao nên đầu tư mbbond ?',
                2 => ECommon::SERVICE_PRICE_LIST,
                3 => 'Lợi nhuận kỳ vọng (Lợi nhuận quy năm và sau thuế phí - Cập nhật đến ngày 13/09/2021)',
                4 => ECommon::TRANSACTION_TIME,
                5 => 'Quy trình giao dịch',
                6 => ECommon::SERVICE_PROVIDER_ORGANIZATION,
                8 => 'Danh mục đầu tư',
                10 => 'Tài liệu quỹ',
                11 => 'Báo cáo nhà đầu tư',
                12 => ECommon::ACCESS_LINK,
                13 => 'Đại lý phân phối',
                14 => ECommon::FUND_CHARTER,
                15 => ECommon::PROSPECTUS,
                16 => ECommon::FUND_INFO,
                17 => ECommon::GUIDE_DOCUMENT,
                18 => ECommon::EXPECTED_PROFIT
            ],
            2 => [
                1 => 'Tại sao nên đầu tư jambf ?',
                2 => ECommon::SERVICE_PRICE_LIST,
                3 => 'Lợi nhuận kỳ vọng (Lợi nhuận quy năm và sau thuế phí - Cập nhật đến ngày 13/09/2021)',
                4 => ECommon::TRANSACTION_TIME,
                5 => 'Quy trình giao dịch',
                6 => ECommon::SERVICE_PROVIDER_ORGANIZATION,
                14 => ECommon::FUND_CHARTER,
                15 => ECommon::PROSPECTUS,
                16 => ECommon::FUND_INFO,
                17 => ECommon::GUIDE_DOCUMENT
            ],
            3 => [
                1 => 'Tại sao nên chọn MB Hưu trí An Thịnh ?',
                4 => ECommon::TRANSACTION_TIME,
                5 => 'Quy trình tham gia',
                7 => 'Quỹ MB An Khang,Quỹ MB Thịnh Vượng',
                12 => ECommon::ACCESS_LINK,
                14 => ECommon::FUND_CHARTER,
                15 => ECommon::PROSPECTUS,
                16 => ECommon::FUND_INFO,
                17 => ECommon::GUIDE_DOCUMENT
            ],
            4 => [
                1 => 'Tại sao nên đầu tư MBVF ?',
                2 => ECommon::SERVICE_PRICE_LIST,
                3 => 'Lợi suất đầu tư',
                4 => ECommon::TRANSACTION_TIME,
                5 => 'Quy trình giao dịch',
                6 => ECommon::SERVICE_PROVIDER_ORGANIZATION,
                7 => 'Hình thức đầu tư',
                8 => 'Phân bổ ngành',
                9 => 'Top 5 cổ phiếu có tỷ trọng cao nhất',
                10 => 'Tài liệu quỹ',
                11 => 'Báo cáo nhà đầu tư',
                12 => ECommon::ACCESS_LINK,
                13 => 'Đại lý phân phối',
                14 => ECommon::FUND_CHARTER,
                15 => ECommon::PROSPECTUS,
                16 => ECommon::FUND_INFO,
                17 => ECommon::GUIDE_DOCUMENT,
                18 => ECommon::EXPECTED_PROFIT,
                19 => 'Top 5 cổ phiếu có tỷ trọng cao nhất(mobile)'

            ]
        ];
    }

    public static function valueToName($fundType, $fundMasterType)
    {
        $data = static::getList();
        return $data[$fundType][$fundMasterType] ?? '';
    }
}
