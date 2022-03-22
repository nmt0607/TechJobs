<?php

namespace App\Exports;

use App\Models\ServiceProduct;
use App\Models\User;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
class ServiceProductExport implements FromCollection,WithHeadings,WithMapping,WithEvents,WithCustomStartCell,WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use RegistersEventListeners;

    protected $key_name;
    protected $sortingName;
    protected $name;

    public $stt = 0;
    public $manager = [];
    public $category = [];
    protected $countRow = 0;
    protected $height = 30;
    public function __construct($key_name, $sortingName, $search, $searchName){
        $this->key_name = trim($key_name);
        $this->sortingName = trim($sortingName);
        $this->search = trim($search);
        $this->searchName= trim($searchName);
    }

    public function collection()
    {
        ini_set('memory_limit', '-1');
        set_time_limit(0);

        $query = $this->getQuery();
        $this->manager = User::query()->pluck('name','id')->toArray();
        $this->category = Category::query()->pluck('name','id')->toArray();

        $query = $query->orderBy($this->key_name,$this->sortingName)->get();
        $this->countRow = count($query);
        return $query;
    }

    public function getQuery(){
        $query = ServiceProduct::query();
        if($this->searchName) {
            $query->where("name", "like", "%".$this->searchName."%");
        }
        return $query;
    }

    public function headings(): array {
        return [
            "STT",
            "Tên sản phẩm",
            "Trạng thái",
            "Danh mục",
            "Người quản lý",
            "Thang điểm",
            "Mô tả",
        ];
    }
    public function map($data): array {
        return [
            ++$this->stt,
            $data->name,
            $data->status==1?'Đang hoạt động':'Không hoạt động',
            $this->category[$data->category_id]??'',
            $this->manager[$data->user_id]??'',
            $data->rate,
            $data->description,
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
                        "A1:F2",
                        "G1:G2",
                    ]);
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight($this->height);
                $event->sheet->getDelegate()->getRowDimension('2')->setRowHeight($this->height);
                $event->sheet->getDelegate()->setCellValue("A1", "Table ServiceProduct data");
                // $event->sheet->getDelegate()->setCellValue("A2", "Chào các bạn");

                $event->sheet->getStyle("A3:G3")->getAlignment()->setWrapText(true);
                $active_sheet = $event->sheet->getDelegate();
                $active_sheet->getParent()->getDefaultStyle()->applyFromArray($default_font_style);
                $active_sheet->getParent()->getDefaultStyle()->getAlignment()->applyFromArray(
                    array("horizontal" => "left")
                );

                $arrayAlphabet = [
                    "B", "C", "D", "E", "F", "G", 
                ];
                foreach ($arrayAlphabet as $alphabet) {
                    $event->sheet->getColumnDimension($alphabet)->setWidth(30);
                }
                $event->sheet->getColumnDimension("A")->setWidth(5);
                // title
                $cellRange = "A3:G3";
                $active_sheet->getStyle($cellRange)->applyFromArray($default_font_style_title);
                $active_sheet->getStyle($cellRange)->getAlignment()->applyFromArray(
                    array("horizontal" => "center", "vertical"=>"center")
                );

                if($this->countRow) $active_sheet->getStyle("A4:G".($this->countRow+3))->applyFromArray($default_font_style2);

                //style array text
                $active_sheet->getStyle("A1:F1")->getAlignment()->applyFromArray(
                    array("horizontal" => "center", "vertical"=>"center")
                );
                $active_sheet->getStyle("A1:F1")->applyFromArray($default_font_style_title2);
                $active_sheet->getStyle("A2:F2")->getAlignment()->applyFromArray(
                    array("horizontal" => "center", "vertical"=>"center")
                );
                $active_sheet->getStyle("A2:F2")->applyFromArray($default_font_style_title2);
                $active_sheet->getStyle('G1')->getAlignment()->applyFromArray(
                    array("horizontal" => "center", "vertical"=>"center")
                );

                $active_sheet->getStyle('G1:G2')->getAlignment()->applyFromArray(
                    array("valignment" => "center")
                );
                $event->sheet->getDelegate()->getStyle('G1:G2')->getAlignment()->setVertical('Center');
            },
        ];
    }
    public function startCell(): string
    {
        return "A3";
    }

    // insert image
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/logo.png'));
        $drawing->setHeight(4*$this->height);
        $drawing->setCoordinates('G1');
        return $drawing;
    }
}
