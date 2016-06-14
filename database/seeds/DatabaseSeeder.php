<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(BannerTableSeeder::class);
        $this->call(CompanyNewTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(PartnerTableSeeder::class);
        $this->call(RecruitTableSeeder::class);

        Model::reguard();
    }
}
