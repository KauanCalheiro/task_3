<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nome' => 'admin',
            'email' => 'admin@gmail.com',
            'cpf' => '03471997040',
            'rg' => '4545454',
            'dt_nascimento' => '2024-09-22',
            'senha' => bcrypt('admin'),
        ]);
    }
}
