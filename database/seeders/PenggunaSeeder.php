<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Manager',
            'email'=>'manager@vhiweb.com',
            'password'=>bcrypt('12345678')
        ]);

        User::create([
            'name'=>'Keuangan',
            'email'=>'demo@vhiweb.com',
            'password'=>bcrypt('12345678')
        ]);
    }
}
