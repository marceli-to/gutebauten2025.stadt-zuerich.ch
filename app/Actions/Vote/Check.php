<?php
namespace App\Actions\Vote;
use Illuminate\Http\Request;
use App\Models\Voter;
use App\Models\Building;

class Check
{
  public function execute(Request $request): array
  {
    $building = Building::where('slug', $request->slug)->firstOrFail();
    $voter = Voter::where('hash', $request->hash)->first();

    if (!$voter) {
      return ['has_vote' => false];
    }

    $hasVote = $voter->buildings()->where('building_id', $building->id)->exists();
    return ['has_vote' => $hasVote];
  }
}
