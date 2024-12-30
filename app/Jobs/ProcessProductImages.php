<?php

namespace App\Jobs;

use App\Models\product;
use App\Models\ProductImages;
use App\Traits\FileProcessing;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProcessProductImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, FileProcessing;

    protected $product;
    protected $imagePaths;
    protected $urls;

    /**
     * Create a new job instance.
     */
    public function __construct(product $product, array $imagePaths, array $urls)
    {
        $this->product = $product;
        $this->imagePaths = $imagePaths;
        $this->urls = $urls;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        //* suing \Expception to catch all types of exceptions
        try {
            if (!empty($this->imagePaths)) {
                foreach ($this->imagePaths as $path) {
                    ProductImages::create([
                        'product_id' => $this->product->id,
                        'original_url' => $path,
                        'url' => asset('storage/' . $path),
                    ]);
                }
                Cache::forget('product_index');
            } else {

                foreach ($this->urls as $url) {
                    $filename = basename($url);
                    $path = 'images/' . $filename;
                    $storedPath = $this->downloadFile($url, $path);
                    if ($storedPath) {
                        ProductImages::create([
                            'product_id' => $this->product->id,
                            'original_url' => $url,
                            'url' => asset('storage/' . $storedPath),
                        ]);
                    }
                }
                cache::forget('product_index');
            }
        } catch (\Exception $e) {
            Log::error('Error in ProcessProductImages job', [
                'error' => $e->getMessage(),
                'productId' => $this->product->id,
                'imagePaths' => $this->imagePaths,
                'urls' => $this->urls
            ]);
        }

        Log::info('ProcessProductImages job finished');
    }
}
