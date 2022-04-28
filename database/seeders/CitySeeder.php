<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{

    /**
     * @var \App\Models\City;
     */
    protected $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->city->insert([
            'city_name' => 'Gaza'
        ]);

        $this->city->insert([
            'city_name' => 'KhanYounis'
        ]);

        $this->city->insert([
            'city_name' => 'Rafah'
        ]);

    }
}
