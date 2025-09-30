<?php

namespace App\Console\Commands;

use App\Models\Building;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ExportBuildingAwards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'buildings:export-awards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export building IDs and awards to JSON file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Exporting building awards...');

        $buildings = Building::select('id', 'award')->get();

        $data = $buildings->map(function ($building) {
            return [
                'id' => $building->id,
                'award' => $building->award
            ];
        })->toArray();

        $json = json_encode($data, JSON_PRETTY_PRINT);

        Storage::disk('public')->put('building_awards.json', $json);

        $this->info('Exported ' . count($data) . ' building awards to storage/app/public/building_awards.json');

        return Command::SUCCESS;
    }
}
