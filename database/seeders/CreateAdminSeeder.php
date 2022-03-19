<?php

namespace Database\Seeders;

use App\Models\User;
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
        DB::table('users')->truncate();
        $admin = User::create([
            'name' => 'Hassan Raza',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ]);
        $admin2 = User::create([
            'name' => 'Le Minh Quan',
            'email' => 'leminhquan@test.com',
            'email_verified_at' => now(),
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
    }
}
