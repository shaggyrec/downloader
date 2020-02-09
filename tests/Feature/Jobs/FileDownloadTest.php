<?php


use App\Jobs\FileDownload;
use Illuminate\Support\Facades\Storage;

class FileDownloadTest extends \Tests\TestCase
{
    use \Illuminate\Foundation\Testing\RefreshDatabase;

    public function testDownloadFile(): void
    {
        $file = \App\File::find(1);
        $storage = self::storage();
        (new FileDownload($file))
            ->handle($storage);
        $storage->delete($file->url);
        $this->assertSame('complete', $file->status);
    }

    private static function storage()
    {
        return Storage::disk('local');
    }
}
