<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonPhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('person_phones')->insert([
            1 => ['id' => 1, 'phone' => '999999999', 'person_id' => 1]
        ]);
    }
}
