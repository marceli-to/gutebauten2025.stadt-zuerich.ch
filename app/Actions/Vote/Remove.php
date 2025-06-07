<?php
namespace App\Actions\Vote;
use App\Models\Voter;
use App\Models\Building;
use App\Stores\Store;
use Illuminate\Http\Request;

class Remove
{
  public function execute(Request $request): void
  {
    $building = Building::where('slug', $request->slug)->firstOrFail();
    $voter = Voter::where('hash', $request->hash)->first();
    if ($voter) {
      $voter->buildings()->detach($building->id);
    }
  }
}
