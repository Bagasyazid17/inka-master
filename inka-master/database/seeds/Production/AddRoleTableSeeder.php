<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Role;

class AddRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // DB::table('role')->delete();

        $roles = array(
            ['nama' => 'Admin Sub Topik'],
        );
            
        foreach ($roles as $role)
        {
            Role::create($role);
        }
        
        Model::reguard();
    }
}
