<?php

namespace App\Jobs;

use App\Services\XmlParserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $item;
    protected $source_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($item, $source_id)
    {       
        $this->item = $item;
        $this->source_id = $source_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(XmlParserService $xmlParserService)
    {
        $xmlParserService->parseYandex($this->item, $this->source_id);
    }
}
