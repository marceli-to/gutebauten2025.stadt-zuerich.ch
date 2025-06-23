<?php
namespace App\View\Components\Buildings;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Building;

class Teaser extends Component
{
  public $building;

  public function __construct(String $slug)
  {
    $building = Building::where('slug', $slug)->first();
    $this->building = $building;
  }

  public function render(): View|Closure|string
  {
    return view('components.buildings.teaser', [
      'building' => $this->building,
    ]);
  }
}
