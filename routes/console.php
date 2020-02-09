<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('list-of-files', function () {
    $this->info('src | url | status');
    array_map(
        function ($file) {
            $this->info($file->src . ' | ' . $file->url  . ' | ' .  $file->status);
        },
        json_decode(app()->call(\App\Http\Controllers\File::class . '@listOfFiles'))
    );
})->describe('Display list of files');


Artisan::command('to-queue {src}', function ($src) {
    addFileToTheDownloadQueue($src);
    $this->info('File has been added');
})->describe('Add file to the download queue');
