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
    return view('pages.building', [
      'building' => $building->load('comments'),
      'hasVote' => $store->hasVote($building->id),
      'browse' => $this->getBrowse($building),
    ]);
  }

  /**
   * Get previous and next building navigation URLs.
   *
   * @param Building $building
   * @return array
   */
  private function getBrowse(Building $building): array
  {
    $buildingSlugs = Building::orderBy('id')->pluck('slug')->all();

    $currentIndex = array_search($building->slug, $buildingSlugs);
    $total = count($buildingSlugs);

    $prevIndex = ($currentIndex - 1 + $total) % $total;
    $nextIndex = ($currentIndex + 1) % $total;

    $prevSlug = $buildingSlugs[$prevIndex];
    $nextSlug = $buildingSlugs[$nextIndex];

    return [
      'prev' => route('page.building', ['building' => $prevSlug]),
      'next' => route('page.building', ['building' => $nextSlug]),
    ];
  }
}
