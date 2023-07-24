<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mark;
use App\Jobs\FetchModelsForMarks;
use Illuminate\Foundation\Bus\DispatchesJobs;

class FetchMarkAndModelsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:marks-and-models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch car marks and models from external API and store in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $marks = httpGetJson('https://vpic.nhtsa.dot.gov/api/vehicles/GetAllMakes?format=json');
        $marks = $marks['Results'];
        $data = [];

        foreach ($marks as $mark) {
            $data['marks'][] = [
                'name' => $mark['Make_Name'],
                'api_id' => $mark['Make_ID'],
            ];
        }

        $data['marks'] = array_chunk($data['marks'], 100);

        foreach ($data['marks'] as $chunk) {
            Mark::upsert($chunk, ['api_id', 'name']);
            FetchModelsForMarks::dispatch($chunk);
        }

        $this->info('Car marks and models fetched and stored successfully!');
    }
}