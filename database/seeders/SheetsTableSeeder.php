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
        $sheets = \App\Models\Sheet::factory(1)->create([
            'name'=>'Customer',
            'brief'=>'顾客列表',
            'explanation'=>'顾客访问信息',
        ]);
        $sheets->each(function ($sheet) { // TODO insert type sample
            \App\Models\Content::create([
                'sheet_id' => $sheet->id,
                'name' => 'James Peter',
                'data' => [
                    'money' => 30,
                    'coffee' => 3,
                    'nickname' => 'jj',
                ],
            ]);
            \App\Models\Content::create([
                'sheet_id' => $sheet->id,
                'name' => 'Newton Adam',
                'data' => [
                    'money' => 60,
                    'coffee' => 5,
                    'nickname' => 'nn',
                ],
            ]);
            \App\Models\Column::create([
                'sheet_id' => $sheet->id,
                'name' => 'money',
                'type' => 'int',
                'order_by' => 3,
            ]);
            \App\Models\Column::create([
                'sheet_id' => $sheet->id,
                'name' => 'coffee',
                'type' => 'int',
                'order_by' => 2,
            ]);
            \App\Models\Column::create([
                'sheet_id' => $sheet->id,
                'name' => 'nickname',
                'type' => 'str',
                'order_by' => 1,
            ]);
        });

        $sheets = \App\Models\Sheet::factory(1)->create([
            'name'=>'Item',
            'brief'=>'道具列表',
            'explanation'=>'道具清单',
        ]);
        $sheets->each(function ($sheet) { // TODO insert type sample
            \App\Models\Content::create([
                'sheet_id' => $sheet->id,
                'name' => 'milk',
                'data' => [
                    'price' => 30,
                    'amount' => 1,
                    'gain' => 'store',
                ],
            ]);
            \App\Models\Content::create([
                'sheet_id' => $sheet->id,
                'name' => 'bean',
                'data' => [
                    'price' => 30,
                    'amount' => 1,
                    'gain' => 'store',
                ],
            ]);
            \App\Models\Column::create([
                'sheet_id' => $sheet->id,
                'name' => 'price',
                'type' => 'int',
                'order_by' => 1,
            ]);
            \App\Models\Column::create([
                'sheet_id' => $sheet->id,
                'name' => 'amount',
                'type' => 'int',
                'order_by' => 2,
            ]);
            \App\Models\Column::create([
                'sheet_id' => $sheet->id,
                'name' => 'unit',
                'type' => 'str',
                'order_by' => 3,
                'explanation' => '单位',
            ]);
            \App\Models\Column::create([
                'sheet_id' => $sheet->id,
                'name' => 'gain',
                'type' => 'txt',
                'order_by' => 4,
                'explanation' => '在哪儿获取',
            ]);
        });
    }
}




