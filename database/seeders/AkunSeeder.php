<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'maheswari',
                'nomor_telepon' => '087641672113',
                'role' => 'Super Admin',
                'penduduk_id' => '3',
                'desa_id' => '1101010002',
                'email' => 'putriputu32@gmail.com',
                'password'=> bcrypt('superadmin'),
            ],
            [
                'username' => 'maheswari',
                'nomor_telepon' => '087641672113',
                'role' => 'Admin',
                'penduduk_id' => '3',
                'desa_id' => '1101010002',
                'email' => 'putri32@gmail.com',
                'password'=> bcrypt('admin'),
            ],
            [
                'username' => 'maheswari',
                'nomor_telepon' => '087641672113',
                'role' => 'Bendesa',
                'penduduk_id' => '3',
                'desa_id' => '1101010002',
                'email' => 'putu32@gmail.com',
                'password'=> bcrypt('kades'),
            ],
            [
                'username' => 'maheswari',
                'nomor_telepon' => '087641672113',
                'role' => 'Kelian Banjar Adat',
                'penduduk_id' => '3',
                'desa_id' => '1101010002',
                'email' => 'putri@gmail.com',
                'password'=> bcrypt('kadus'),
            ],
            [
                'username' => 'maheswari',
                'nomor_telepon' => '087641672113',
                'role' => 'Krama',
                'penduduk_id' => '3',
                'desa_id' => '1101010002',
                'email' => 'diah@gmail.com',
                'password'=> bcrypt('user'),
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
