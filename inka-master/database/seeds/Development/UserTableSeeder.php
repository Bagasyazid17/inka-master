<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();

        $users = array(
            ['name' => 'Administrator',
            'email' => 'admin@inka.com',
            'alamat' => 'Jl. Penjaringan Timur',
            'nomor_ktp' => '3572460101140001',
            'nomor_telpon' => '081233103652',
            'departemen' => 'Web Dev',
            'foto' => '/images/users/20171124-074020-Administrator.png',
            'password' => Hash::make('secret'),
            'role_id' => 1],
        );
        
        foreach ($users as $user)
        {
            User::create($user);
        }
        
        Model::reguard();
    }
}
