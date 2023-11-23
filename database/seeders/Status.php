<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['id' => 1, 'title' => 'Опубликовано'],
            ['id' => 2, 'title' => 'Черновик'],
            ['id' => 3, 'title' => 'Не активен']
        ];
        DB::table('statuses')->insert($status);
    }
}
