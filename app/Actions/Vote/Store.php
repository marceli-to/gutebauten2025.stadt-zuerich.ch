<?php
namespace App\Actions\Vote;
use App\Models\Voter;
use App\Models\Building;
use Illuminate\Http\Request;

class Store
{
  public function execute(Request $request): void
  {
    $building = Building::where('slug', $request->slug)->firstOrFail();

    $voter = Voter::firstOrCreate(
      ['hash' => $request->hash],
      ['ip_address' => md5($request->ip())]
    );

    if (!$voter->buildings()->where('building_id', $building->id)->exists()) {
      $voter->buildings()->attach($building->id, ['voted_at' => now()]);
    }
  }
}
