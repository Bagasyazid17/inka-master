<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('role')->delete();

        $roles = array(
            ['nama' => 'Administrator'],
        );
            
        foreach ($roles as $role)
        {
            Role::create($role);
        }
        
        Model::reguard();
    }
}
