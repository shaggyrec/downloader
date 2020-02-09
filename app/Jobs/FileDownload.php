<?php

namespace App\Jobs;

use App\File;
use ErrorException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FileDownload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var File
     */
    private $file;

    /**
     * Create a new job instance.
     *
     * @param File $file
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @param Filesystem $adapter
     * @return void
     * @throws \Exception
     */
    public function handle(Filesystem $adapter): void
    {
        $this->file->setStatus(File::STATUS_DOWNLOADING);
        $path = md5($this->file->src . random_bytes(5)) . self::extention($this->file->src);
        try {
            $adapter->put(
                'public/' . $path,
                fopen($this->file->src, 'r')
            );
            $this->file->status = File::STATUS_COMPLETE;
            $this->file->url = $path;
            $this->file->save();
        } catch (\Exception $exception) {
            $this->file->setStatus(File::STATUS_ERROR);
        }
    }

    private static function extention(string $src): string
    {
        return isset(pathinfo($src)['extension']) ? '.' . pathinfo($src)['extension'] : '';
    }

}
