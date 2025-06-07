<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Building;
use App\Stores\UserStore;

class BuildingController extends Controller
{
  public function index(Building $building, UserStore $store): View
  {
    $hasVote = $store->hasVote($building->id);
    return view('pages.building', [
      'building' => $building,
      'hasVote' => $hasVote,
    ]);
  }
}
