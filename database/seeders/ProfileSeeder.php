<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::factory()->create([
            'name' => 'Ben Wilson',
            'email' => 'hello@company.co',
            'bio' => 'Ben Resume HTML Template is brought to you by Tooplate website.',
            'address' => 'Egypt',
            'phone_number' => '010-020-0340',
            'gender' => 'male',
            'birthdate' => '1999-09-26',
        ]);
    }
}
