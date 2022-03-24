<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sla;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->truncate();
        $admin = User::firstOrCreate([
            'name' => 'Hassan Raza',
            'email' => 'admin@test.com',
            'password' => bcrypt('123456'),
        ]);
        $admin2 = User::firstOrCreate([
            'name' => 'Le Minh Quan',
            'email' => 'leminhquan@test.com',
            'password' => bcrypt('12345678!'),
        ]);

        // $admin->assignRole('admin');
        // $admin2->assignRole('admin');

        // tạo category
        for($i = 1; $i <= 5; $i++){
            Category::create([
                'name' => 'Danh mục '.$i,
            ]);
        }
        // seeder sla
        Sla::create([
            'type' => 1,
            'process_time_json' => '{"day":5,"hour":12,"minute":30}'
        ]);
        Sla::create([
            'type' => 2,
            'process_time_json' => '{"day":1,"hour":18,"minute":0}'
        ]);
        Sla::create([
            'type' => 3,
            'process_time_json' => '{"day":1,"hour":0,"minute":0}'
        ]);
        Sla::create([
            'type' => 4,
            'process_time_json' => '{"day":0,"hour":6,"minute":0}'
        ]);
    }
}
