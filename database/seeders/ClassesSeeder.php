<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('classes')->truncate();
        Schema::enableForeignKeyConstraints();

        $classes = [
            ['class' => 'X PPLG 1'],
            ['class' => 'X PPLG 2'],
            ['class' => 'X TJKT 1'],
            ['class' => 'X TJKT 2'],
            ['class' => 'X PM 1'],
            ['class' => 'X PM 2'],
            ['class' => 'X MPLB 1'],
            ['class' => 'X MPLB 2'],
            ['class' => 'X AKL 1'],
            ['class' => 'X AKL 2'],
            ['class' => 'X AKL 3'],
            ['class' => 'X PH 1'],
            ['class' => 'X PH 2'],
            ['class' => 'X PH 3'],
            ['class' => 'X KL 1'],
            ['class' => 'X DKV 1'],
            ['class' => 'X DKV 2'],
            ['class' => 'X SP 1'],
            ['class' => 'X BDP 1'],
            ['class' => 'X BDP 2'],
            ['class' => 'XI PPLG 1'],
            ['class' => 'XI PPLG 2'],
            ['class' => 'XI TJKT 1'],
            ['class' => 'XI TJKT 2'],
            ['class' => 'XI PM 1'],
            ['class' => 'XI PM 2'],
            ['class' => 'XI MPLB 1'],
            ['class' => 'XI MPLB 2'],
            ['class' => 'XI AKL 1'],
            ['class' => 'XI AKL 2'],
            ['class' => 'XI AKL 3'],
            ['class' => 'XI PH 1'],
            ['class' => 'XI PH 2'],
            ['class' => 'XI PH 3'],
            ['class' => 'XI KL 1'],
            ['class' => 'XI DKV 1'],
            ['class' => 'XI DKV 2'],
            ['class' => 'XI SP 1'],
            ['class' => 'XI BDP 1'],
            ['class' => 'XI BDP 2'],
            ['class' => 'XII PPLG 1'],
            ['class' => 'XII PPLG 2'],
            ['class' => 'XII TJKT 1'],
            ['class' => 'XII TJKT 2'],
            ['class' => 'XII PM 1'],
            ['class' => 'XII PM 2'],
            ['class' => 'XII MPLB 1'],
            ['class' => 'XII MPLB 2'],
            ['class' => 'XII AKL 1'],
            ['class' => 'XII AKL 2'],
            ['class' => 'XII AKL 3'],
            ['class' => 'XII PH 1'],
            ['class' => 'XII PH 2'],
            ['class' => 'XII PH 3'],
            ['class' => 'XII KL 1'],
            ['class' => 'XII DKV 1'],
            ['class' => 'XII DKV 2'],
            ['class' => 'XII SP 1'],
            ['class' => 'XII BDP 1'],
            ['class' => 'XII BDP 2'],
        ];

        DB::table("classes")->insert($classes);
    }
}
