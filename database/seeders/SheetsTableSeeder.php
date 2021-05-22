<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SheetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sheets = \App\Models\Sheet::factory(1)->create();
        $sheets->each(function ($sheet) { // TODO insert type sample
            \App\Models\Content::create([
                'sheet_id' => $sheet->id,
                'data' => [
                    'money' => 30,
                    'player' => 'peter',
                ],
            ]);
            \App\Models\Content::create([
                'sheet_id' => $sheet->id,
                'data' => [
                    'money' => 60,
                    'player' => 'james',
                ],
            ]);
            \App\Models\Column::create([
                'sheet_id' => $sheet->id,
                'name' => 'money',
                'type' => 'int',
                'order_by' => 1,
            ]);
            \App\Models\Column::create([
                'sheet_id' => $sheet->id,
                'name' => 'player',
                'type' => 'str',
                'order_by' => 2,
            ]);
        });
    }
}




