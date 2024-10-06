<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Carbon\Carbon;

class DeleteOldProducts extends Command
{
    
    protected $signature = 'products:delete-old';
    protected $description = 'Delete products older than 7 days';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle(){
        $threshold = Carbon::now()->subDays(7);
        $oldProducts=Product::where('created_at', '<', $threshold)->get();
        foreach($oldProducts as $product){
            $product->delete();
        }
        $this->info('Old products deleted successfully');
    }
}
