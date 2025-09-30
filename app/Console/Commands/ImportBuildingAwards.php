<?php

namespace App\Console\Commands;

use App\Models\Building;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportBuildingAwards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'buildings:import-awards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import building awards from JSON file and update database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Importing building awards...');

        if (!Storage::disk('public')->exists('building_awards.json')) {
            $this->error('JSON file not found at storage/app/public/building_awards.json');
            return Command::FAILURE;
        }

        $json = Storage::disk('public')->get('building_awards.json');
        $data = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->error('Invalid JSON format in building_awards.json');
            return Command::FAILURE;
        }

        $updated = 0;
        $notFound = 0;

        foreach ($data as $item) {
            if (!isset($item['id']) || !array_key_exists('award', $item)) {
                $this->warn('Skipping invalid item: missing id or award field');
                continue;
            }

            $building = Building::find($item['id']);

            if ($building) {
                $building->update(['award' => $item['award']]);
                $updated++;
            } else {
                $this->warn("Building with ID {$item['id']} not found");
                $notFound++;
            }
        }

        $this->info("Import completed:");
        $this->info("- Updated: {$updated} buildings");
        if ($notFound > 0) {
            $this->warn("- Not found: {$notFound} buildings");
        }

        return Command::SUCCESS;
    }
}
