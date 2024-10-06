<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('products:delete-old',function() {
    $threshold = Carbon::now()->subDays(7);
    $oldProducts = Product::where('created_at', '<', $threshold)->get();
    foreach($oldProducts as $product){
        $product->delete();
    }
    Log::info('Old products deleted successfully');
})->purpose('Delete products older than 7 days');

