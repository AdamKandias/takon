<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('statusses')->truncate();
        Schema::enableForeignKeyConstraints();

        $statusses = [
            ['status' => 'Siswa'],
            ['status' => 'Admin'],
        ];

        DB::table("statusses")->insert($statusses);
    }
}
