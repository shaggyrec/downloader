<?php

use App\Jobs\FileDownload;

function addFileToTheDownloadQueue(string $src): void
{
    $file = new \App\File;
    $file->src = $src;
    $file->save();
    FileDownload::dispatch($file);
}
