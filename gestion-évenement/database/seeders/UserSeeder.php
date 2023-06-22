<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(1)->create();
        User::create(['name_user' => 'admin','email_user'=>'exemple@gmail.com','cin' => 'EB000000','tel_user' => '+212 60000000','pw_user' => Hash::make('admin')]);
    }
}
