<?php

use Illuminate\Database\Seeder;

class LendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         foreach (range(1, 2) as $num) {
            DB::table('lends')->insert([
                'user_id' => 1,
                'name' => "名無しさん {$num}",
                'email' => "xxx@gmail.com",
                'lending_money' => 100*$num,
                'status' => $num,
                'interval' => $num,
            ]);
        }
    }
}
