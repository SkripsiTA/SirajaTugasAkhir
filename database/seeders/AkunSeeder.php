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
                'penduduk_id' => '130',
                'desa_adat_id' => '1487',
                'email' => 'superadmin@gmail.com',
                'password'=> bcrypt('superadmin'),
            ],
            [
                'username' => 'maheswari',
                'nomor_telepon' => '087641672113',
                'role' => 'Admin',
                'penduduk_id' => '130',
                'desa_adat_id' => '1487',
                'email' => 'admin@gmail.com',
                'password'=> bcrypt('admin'),
            ],
            [
                'username' => 'maheswari',
                'nomor_telepon' => '087641672113',
                'role' => 'Bendesa',
                'penduduk_id' => '130',
                'desa_adat_id' => '1487',
                'email' => 'bendesa@gmail.com',
                'password'=> bcrypt('bendesa'),
            ],
            [
                'username' => 'maheswari',
                'nomor_telepon' => '087641672113',
                'role' => 'Penyarikan',
                'penduduk_id' => '130',
                'desa_adat_id' => '1487',
                'email' => 'penyarikan@gmail.com',
                'password'=> bcrypt('penyarikan'),
            ],
            [
                'username' => 'maheswari',
                'nomor_telepon' => '087641672113',
                'role' => 'Krama',
                'penduduk_id' => '130',
                'desa_adat_id' => '1487',
                'email' => 'krama@gmail.com',
                'password'=> bcrypt('user'),
            ],
            [
                'username' => 'maheswari',
                'nomor_telepon' => '087641672113',
                'role' => 'Panitia',
                'penduduk_id' => '130',
                'desa_adat_id' => '1487',
                'email' => 'panitia@gmail.com',
                'password'=> bcrypt('panitia'),
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
