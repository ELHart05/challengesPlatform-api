<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::create([
                'full_name' => 'abdessamed',
                'email' => 'abdessamed@admin.com',
                'password' => Hash::make('5RO8TTzmUPg4'),
                'role' => 'admin'
            ]);
            User::create([
                'full_name' => 'ouael',
                'email' => 'ouael@admin.com',
                'password' => Hash::make('FVFHAOEr3FA8'),
                'role' => 'admin'
            ]);
            User::create([
                'full_name' => 'abderraouf',
                'email' => 'abderraouf@admin.com',
                'password' => Hash::make('Ui3tCLLtlpl2'),
                'role' => 'admin'
            ]);
            User::create([
                'full_name' => 'abderrahman',
                'email' => 'abderrahman@admin.com',
                'password' => Hash::make('PrCiXwB5X9wy'),
                'role' => 'admin'
            ]);
    }
}
