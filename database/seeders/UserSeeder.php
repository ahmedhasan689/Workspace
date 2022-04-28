<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * @var \App\Models\User;
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->user->insert([
            'full_name' => 'Omar Mohammed',
            'email' => 'Omar@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make(12345678),
            'phone_number' => '0595959593',
            'city_id' => '3',
        ]);

        $this->user->insert([
            'full_name' => 'Anas Salah',
            'email' => 'Anas@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make(12345678),
            'phone_number' => '0595959594',
            'city_id' => '1',
        ]);
    }
}
