<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Rider;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'super_admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'member']);

        $superadmin = User::create([
            'name' => 'Windra',
            'email' => 'wamyrullah@desrc.id',
            'password' => bcrypt('password'),
        ]);
        $superadmin->assignRole('super_admin');

        $member = User::create([
            'name' => 'Nisa',
            'email' => 'nisa@desrc.id',
            'password' => bcrypt('password'),
        ]);
        $member->assignRole('member');

        Rider::create([
            'user_id' => $superadmin->id,
            'nama' => 'Andi Pratama',
            'panggilan' => 'Andi',
            'number_plate' => 'A123',
            'team' => 'Delta Eagles',
            'asal_kota' => 'Sidoarjo',
            'tanggal_lahir' => '2018-05-10',
            'no_kia' => 'KIA001122',
            'photo_rider' => null,
            'photo_kia' => null,
        ]);

        Rider::create([
            'user_id' => $member->id,
            'nama' => 'Budi Santoso',
            'panggilan' => 'Budi',
            'number_plate' => 'B456',
            'team' => 'Speedy Kids',
            'asal_kota' => 'Surabaya',
            'tanggal_lahir' => '2017-09-20',
            'no_kia' => 'KIA009988',
            'photo_rider' => null,
            'photo_kia' => null,
        ]);
    }
}
