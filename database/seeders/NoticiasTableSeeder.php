<?php

namespace Database\Seeders;

use App\Models\Noticias;
use Illuminate\Database\Seeder;

class NoticiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Noticias::factory()->count(10)->create();

    }
}
