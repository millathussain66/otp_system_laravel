<?php

namespace App\Jobs;

use App\Models\Sales;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SalesCsvProcess implements ShouldQueue
{
    use Batchable,Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    public $header;
    /**
     * Create a new job instance.
     */
    public function __construct($data, $header)
    {
        $this->header = $header;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->data as $key => $value) {

            $salesData = array_combine($this->header, $value);

            Sales::create($salesData);
        }
    }

    public function failed()
    {

    }
}
