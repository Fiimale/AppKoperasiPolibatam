<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('polibatam'),
                'role_id' => '1',
                'status_user' => '1',
            ],[
                'nama' => 'ketua',
                'email' => 'ketua@gmail.com',
                'password' => Hash::make('ketua123'),
                'role_id' => '1',
                'status_user' => '1',

            ],[
                'nama' => 'sekretaris',
                'email' => 'sekretaris@gmail.com',
                'password' => Hash::make('sekretaris123'),
                'role_id' => '1',
                'status_user' => '1',

            ],[
                'nama' => 'anggota',
                'email' => 'anggota@gmail.com',
                'password' => Hash::make('anggota'),
                'role_id' => '3',
                'status_user' => '1',

            ],[
                'nama' => 'pengawas',
                'email' => 'pengawas@gmail.com',
                'password' => Hash::make('pengawas'),
                'role_id' => '2',
                'status_user' => '1',
            ]
        ]);
    }
}
