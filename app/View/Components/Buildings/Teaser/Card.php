<?php
namespace App\View\Components\Buildings\Teaser;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Building;

class Card extends Component
{
  public $building;

  public function __construct(Building $building)
  {
    $this->building = $building;
  }

  public function render(): View|Closure|string
  {
    return view('components.buildings.teaser.card', [
      'building' => $this->building,
    ]);
  }
}
