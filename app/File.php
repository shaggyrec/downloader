<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public const STATUS_PENDING = 0;
    public const STATUS_DOWNLOADING = 1;
    public const STATUS_COMPLETE = 2;
    public const STATUS_ERROR = 3;

    private const statusesMap = [
        self::STATUS_PENDING => 'pending',
        self::STATUS_DOWNLOADING => 'downloading',
        self::STATUS_COMPLETE => 'complete',
        self::STATUS_ERROR => 'error'
    ];

    public function getStatusAttribute(string $value): string
    {
        return self::statusesMap[(int)$value];
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
        $this->save();
    }
}
