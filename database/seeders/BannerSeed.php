<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'title' => 'Exemplo',
            'sub_title' => 'SubTitle Exemplo',
            'image' => 'home-sliede-1.jpeg',
        ]);
    }
}
