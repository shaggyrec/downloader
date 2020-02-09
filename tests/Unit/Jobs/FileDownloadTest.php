<?php

namespace Test\Unit\Jobs;

use App\File;
use \App\Jobs\FileDownload;
use Illuminate\Contracts\Filesystem\Filesystem;
use \Mockery as m;
use PHPUnit\Framework\TestCase;

class FileDownloadTest extends TestCase
{

    public function testSetErrorStatusWhenFileWasNotDownloaded(): void
    {
        $file = m::mock(
            \App\File::class,
            ['getAttribute' => 'no-existence-file.png']
        );
        $file->shouldReceive('setStatus')
            ->with(File::STATUS_DOWNLOADING)
            ->once();
        $file->shouldReceive('setStatus')
            ->with(File::STATUS_ERROR)
            ->once();
        (new FileDownload($file))
            ->handle(m::mock(Filesystem::class));
    }
}
