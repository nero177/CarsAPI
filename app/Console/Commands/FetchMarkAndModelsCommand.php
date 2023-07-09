<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mark;
use App\Models\MarkModel;

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

        foreach ($marks['Results'] as $mark) {
            $createdMark = Mark::firstOrCreate([
                'name' => $mark['Make_Name'],
            ]);

            $markId = $mark['Make_ID'];
            $models = httpGetJson("https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMakeId/$markId?format=json");

            if(!isset($models['Results']) || empty($models['Results'])) continue;

            foreach ($models['Results'] as $model) {
                MarkModel::firstOrCreate([
                    'name' => $model['Model_Name'],
                    'mark_id' => $createdMark->id,
                ]);
            }
        }

        $this->info('Car marks and models fetched and stored successfully!');
    }
}