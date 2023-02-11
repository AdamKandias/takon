<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();

        $roles = [
            ['role' => 'Newbie', 'minimum_point' => 0],
            ['role' => 'Penjelajah', 'minimum_point' => 100],
            ['role' => 'Suka Menolong', 'minimum_point' => 200],
            ['role' => 'Terpelajar', 'minimum_point' => 300],
            ['role' => 'Terpercaya', 'minimum_point' => 400],
            ['role' => 'Sedingin Es', 'minimum_point' => 500],
            ['role' => 'Penjawab Handal', 'minimum_point' => 750],
            ['role' => 'Suhu Sesepuh', 'minimum_point' => 1000],
        ];

        DB::table("roles")->insert($roles);
    }
}
