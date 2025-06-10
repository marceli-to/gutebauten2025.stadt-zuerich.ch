<?php
namespace App\View\Components\Buildings;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Building;

class Browse extends Component
{
  public $prev;
  public $next;

  public function __construct(Building $building)
  {
    // Get all buildings ordered by ID
    $buildings = Building::orderBy('id')->get();
    $slugs = $buildings->pluck('slug')->all();

    // Find current index
    $currentIndex = array_search($building->slug, $slugs);
    $total = count($slugs);

    // Calculate prev and next indices with wrap-around
    $prevIndex = ($currentIndex - 1 + $total) % $total;
    $nextIndex = ($currentIndex + 1) % $total;

    // Get full Building models
    $prevBuilding = $buildings[$prevIndex];
    $nextBuilding = $buildings[$nextIndex];

    // Prepare data for the view
    $this->prev = [
      'slug' => $prevBuilding->slug,
      'title' => $prevBuilding->title,
      'url' => route('page.building', ['building' => $prevBuilding->slug]),
    ];

    $this->next = [
      'slug' => $nextBuilding->slug,
      'title' => $nextBuilding->title,
      'url' => route('page.building', ['building' => $nextBuilding->slug]),
    ];
  }

  public function render(): View|Closure|string
  {
    return view('components.buildings.browse', [
      'prev' => $this->prev,
      'next' => $this->next,
    ]);
  }
}
