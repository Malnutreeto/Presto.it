<?php

namespace App\Jobs;


use App\Models\Image as ModelsImage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Manipulations;
use Spatie\Image\Image;


class CreateImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $h;
    public $w;
    public $fileName;
    public $path;

    public function __construct($filePath, $w, $h)
    {
        $this->fileName = basename($filePath);
        $this->path = dirname($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path .'/crop_300x200_'. $this->fileName;
 
        $croppedImage = Image::load($srcPath)->crop(Manipulations::CROP_CENTER, $w, $h);
        $croppedImage->save($destPath);
    }
}
