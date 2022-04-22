<?php

namespace Database\Seeders;

use Carbon\Carbon;

use App\Models\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{

    /**
     * @var \App\Models\Owner;
     */

    protected $owner;

    public function __construct(Owner $owner)
    {
        $this->owner = $owner;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->owner->insert([
            'first_name' => 'Ahmed',
            'last_name' => 'Hasan',
            'company_name' => 'Tech Sector',
            'email' => 'ahmed@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make(12345678),
            'phone_number' => '0595959591',
        ]);

        $this->owner->insert([
            'first_name' => 'Yazan',
            'last_name' => 'Ibrahim',
            'company_name' => 'Unit One',
            'email' => 'yazan@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make(12345678),
            'phone_number' => '0595959592',
        ]);
    }
}
