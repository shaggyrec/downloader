<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class File extends Controller
{
    public function toDownloadQueue(Request $request): void
    {
        $src = $request->request->get('src');
        if ($src === null) {
            throw new BadRequestHttpException('Source url was not passed');
        }
        addFileToTheDownloadQueue($src);
    }

    public function listOfFiles(Request $request)
    {
        return \App\File::orderBy('id', 'desc')->get();
    }
}
