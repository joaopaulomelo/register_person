<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            1 => ['id' => 1, 'name' => 'joão paulo', 'email' => 'joaopaulo@email.com', 'cpf' => '00000000000', 'birth_date' => '2020-01-29', 'nationality' =>'Brazil']
        ]);
    }
}
