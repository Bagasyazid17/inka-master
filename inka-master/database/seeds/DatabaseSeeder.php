<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BeritaTableSeeder::class);
        $this->call(BroadcastTableSeeder::class);
        $this->call(CategoryProductTableSeeder::class);
        $this->call(CorporationTableSeeder::class);
        $this->call(GaleriTableSeeder::class);
        $this->call(KarirTableSeeder::class);
        $this->call(MasterProcurementTableSeeder::class);
        $this->call(MasterProductTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(MediaTagTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(ProcurementTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(SliderMasterTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(HomeSettingTableSeeder::class);

        $this->call(AddRoleTableSeeder::class);
    }
}
