<?php

namespace Database\Seeders;

use App\Models\Survey;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
class CreateSurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        for($i = 1; $i <= 10; $i++){
            Survey::updateOrCreate([
                'id' => $i,
                'name' => 'Tên khảo sát '.$i ,
                'type' => rand(1,3),
                'content' => 'Nội dung khảo sát '.$i,
                'rate' => rand(1,4).'.'.rand(0,9).rand(0,9),
            ]);
        }
        for($i = 1; $i <= 100; $i++){
            DB::table('survey_customer')->updateOrInsert([
                'id' => $i,
                'customer_name' => 'Khách hàng '.$i ,
                'phone' => '0'.rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9),
                'email' => 'email'.$i.'@gmail.com',
                'rate' => rand(1,4).'.'.rand(0,9).rand(0,9),
                'content' => 'Đánh giá '.$i,
                'survey_id' => rand(1,10),
                'created_at' => now(),
            ]);
        }
    }
}
