<?php

namespace App\Listeners;

use App\Events\ProductSaved;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class OptimizeProductImage implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ProductSaved  $event
     * @return void
     */
    public function handle(ProductSaved $event)
    {
        $image = (string) Image::read(Storage::disk('public')->get($event->product->image))
            ->brightness(600)
            ->reduceColors(255)
            ->encode();

        Storage::disk('public')->put($event->product->image, (string) $image);
    }
}
