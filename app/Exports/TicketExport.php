<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
class TicketExport implements FromCollection,WithHeadings,WithMapping,WithEvents,WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use RegistersEventListeners;

    protected $key_name;
    protected $sortingName;
    protected $require_code;
    protected $title;

    public $stt = 0;
    protected $countRow = 0;

    public function __construct($key_name, $sortingName, $search, $searchRequireCode, $searchTitle){
        $this->key_name = trim($key_name);
        $this->sortingName = trim($sortingName);
        $this->search = trim($search);
        $this->searchRequireCode= trim($searchRequireCode);
        $this->searchTitle= trim($searchTitle);
    }

    public function collection()
    {
        ini_set('memory_limit', '-1');
        set_time_limit(0);

        $query = Ticket::query();
        if($this->search) {
        }

        if($this->searchRequireCode) {
            $query->where("require_code", "like", "%".$this->searchRequireCode."%");
        }
        if($this->searchTitle) {
            $query->where("title", "like", "%".$this->searchTitle."%");
        }

        $query = $query->orderBy($this->key_name,$this->sortingName)->get();
        $this->countRow = count($query);
        return $query;
    }

    public function headings(): array {
        return [
            "STT",
            "Mã yêu cầu",
            "Tiêu đề",
            "Require Id",
            "Customer Id",
            "Product Id",
            "Trạng thái",
            "Độ ưu tiên",
            "",
            "Delegate Id",
            "Type",
            "User Category Id",
            "User Id",
            "Giải pháp",
            "Đánh giá",
            "Phản hồi",
        ];
    }
    public function map($data): array {
        return [
            ++$this->stt,
            $data->require_code,
            $data->title,
            $data->require_id,
            $data->customer_id,
            $data->product_id,
            $data->status_type,
            $data->priority_type,
            $data->sla_id,
            $data->delegate_id,
            $data->type,
            $data->user_category_id,
            $data->user_id,
            $data->solution,
            $data->rate,
            $data->feedback,
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // style start
                $default_font_style = [
                    'font' => ['name' => 'Times New Roman', 'size' => 12]
                ];

                $default_font_style2 = [
                    'font' => ['name' => 'Times New Roman', 'size' => 12],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ],
                    ],
                ];
                $default_font_style_title = [
                    'font' => ['name' => 'Times New Roman', 'size' => 12, 'bold' =>  true],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                        'startColor' => [
                            'argb' => 'B7DEE8',
                        ],
                        'endColor' => [
                            'argb' => 'B7DEE8',
                        ],
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ],
                    ],
                ];
                $default_font_style_title2 = [
                    'font' => ['name' => 'Times New Roman', 'size' => 14, 'bold' =>  true],
                ];
                // style end
                $event->sheet->getDelegate()
                    ->setMergeCells([
                        "A1:F1",
                        "A2:F2",
                    ]);
                $event->sheet->getDelegate()->setCellValue("A1", "Table Ticket data");
                $event->sheet->getDelegate()->setCellValue("A2", "Chào các bạn");

                $event->sheet->getStyle("A3:P3")->getAlignment()->setWrapText(true);
                $active_sheet = $event->sheet->getDelegate();
                $active_sheet->getParent()->getDefaultStyle()->applyFromArray($default_font_style);
                $active_sheet->getParent()->getDefaultStyle()->getAlignment()->applyFromArray(
                    array("horizontal" => "left")
                );

                $arrayAlphabet = [
                    "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", 
                ];
                foreach ($arrayAlphabet as $alphabet) {
                    $event->sheet->getColumnDimension($alphabet)->setWidth(30);
                }
                $event->sheet->getColumnDimension("A")->setWidth(5);
                // title
                $cellRange = "A3:P3";
                $active_sheet->getStyle($cellRange)->applyFromArray($default_font_style_title);
                $active_sheet->getStyle($cellRange)->getAlignment()->applyFromArray(
                    array("horizontal" => "center", "vertical"=>"center")
                );

                if($this->countRow) $active_sheet->getStyle("A4:P".($this->countRow+3))->applyFromArray($default_font_style2);

                //style array text
                $active_sheet->getStyle("A1:F1")->getAlignment()->applyFromArray(
                    array("horizontal" => "center", "vertical"=>"center")
                );
                $active_sheet->getStyle("A1:F1")->applyFromArray($default_font_style_title2);
                $active_sheet->getStyle("A2:F2")->getAlignment()->applyFromArray(
                    array("horizontal" => "center", "vertical"=>"center")
                );
                $active_sheet->getStyle("A2:F2")->applyFromArray($default_font_style_title2);

            },
        ];
    }
    public function startCell(): string
    {
        return "A3";
    }
}
