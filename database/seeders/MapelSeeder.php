<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('mapel')->truncate();
        Schema::enableForeignKeyConstraints();

        $mapel = [
            ['mapel' => 'IPA'],
            ['mapel' => 'Matematika'],
            ['mapel' => 'Bahasa Indonesia'],
            ['mapel' => 'Bahasa Jawa'],
            ['mapel' => 'Bahasa Inggris'],
            ['mapel' => 'PAI'],
            ['mapel' => 'Sejarah'],
            ['mapel' => 'PKN'],
        ];

        DB::table("mapel")->insert($mapel);
    }
}
