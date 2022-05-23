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
    }
}
