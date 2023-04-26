<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;

class Watermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $product_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($product_image_id)
    {
        $this->product_image_id = $product_image_id;
    }


    public function handle(): void
    {
        $i = Image::find($this->product_image_id);
        if (!$i) {
            return;
        }
        
        $srcPath = "./storage/$i->path";

        $image = SpatieImage::load($srcPath);
        $image->watermark('site_img/solobusta.png')
              ->watermarkOpacity(50)
              ->watermarkPadding(5, 5, Manipulations::UNIT_PERCENT)
              ->watermarkHeight(30, Manipulations::UNIT_PERCENT)
              ->watermarkWidth(30, Manipulations::UNIT_PERCENT);

        $image->save($srcPath);
}
}