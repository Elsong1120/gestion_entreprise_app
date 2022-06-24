<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanydataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companydatas')->insert([
            [
                'vat_number' => 'BE0684579082',
                'company_name' => 'BVBA MILJAAR',
                'activity' => '',
                'address' => 'Vichtesteenweg
                53, 8540 Deerlijk',
                'street' => 'Vichtesteenweg',
                'city' => 'Deerlijk',
                'zip_code' => '8540',
                'nb_building' => '53',
                'country_code' => 'BE',
                'country' => 'België',
                'fix_number' => '',
                'valid' => true,
            ],
        ]);
    }
}
