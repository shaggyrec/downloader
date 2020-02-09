<?php

use Illuminate\Support\Str;

class FilesTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        DB::table('files')->insert([
            'src' => 'https://www.adtelligence.com/wp-content/uploads/190617_ADT_Logo_AI_breit_neg.svg',
            'url' => Str::random(10),
            'status' => 0,
        ]);
    }
}
