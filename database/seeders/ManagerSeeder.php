<?php

namespace Database\Seeders;

use App\Http\Middleware\Manager;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('managers')->insert([
            'email'         => 'admin@manager.com',
            'password'      => Hash::make('secret'),
            'role' => 'admin',
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        DB::table('managers')->insert([
            'email'         => 'moderator@manager.com',
            'password'      => Hash::make('secret'),
            'role' => 'moderator',
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        DB::table('managers')->insert([
            'email'         => 'financial_edit@manager.com',
            'password'      => Hash::make('secret'),
            'role' => 'financial_edit',
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        DB::table('managers')->insert([
            'email'         => 'financial_delete@manager.com',
            'password'      => Hash::make('secret'),
            'role' => 'financial_delete',
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}
