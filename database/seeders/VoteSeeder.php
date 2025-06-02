<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class VoteSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
      $buildingIds = DB::table('buildings')->pluck('id')->toArray();
      $voterIds = DB::table('voters')->pluck('id')->toArray();
  
      // Create weights: repeat building IDs to increase their chance of being picked
      $weightedBuildingIds = collect($buildingIds)->flatMap(function ($id) {
          return array_fill(0, rand(1, 8), $id); // Popular buildings appear more
      })->shuffle()->values();
  
      $votes = [];
  
      foreach ($voterIds as $voterId) {
          $numVotes = rand(1, 16);
  
          // Take from weighted list instead of uniform shuffle
          $votedBuildingIds = $weightedBuildingIds->shuffle()->unique()->take($numVotes);
  
          foreach ($votedBuildingIds as $buildingId) {
              $votes[] = [
                  'voter_id' => $voterId,
                  'building_id' => $buildingId,
              ];
          }
      }
  
      foreach (array_chunk($votes, 500) as $chunk) {
          DB::table('building_voter')->insert($chunk);
      }
  }
  
}
