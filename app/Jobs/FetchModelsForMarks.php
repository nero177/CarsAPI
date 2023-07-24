<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\MarkModel;

class FetchModelsForMarks implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $chunk;
    public function __construct(array $chunk)
    {
        $this->chunk = $chunk;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $models = [];

        foreach($this->chunk as $mark){
            $makeId = $mark['api_id'];
            $makeModels = httpGetJson("https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMakeId/$makeId?format=json");  
            $makeModels = $makeModels['Results'];

            foreach($makeModels as $makeModel){
                $models[] = [
                    'name' => $makeModel['Model_Name'],
                    'api_id' => $makeModel['Model_ID'],
                    'mark_api_id' => $makeId
                ];
            }
        }

        MarkModel::upsert($models, ['api_id', 'mark_api_id', 'name']);
    }
}
