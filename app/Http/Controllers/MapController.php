<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Actions\Building\Get as GetBuildingsAction;

class MapController extends Controller
{
  public function index(): View
  {
    $buildings = (new GetBuildingsAction())->execute();
    $data = [];
    foreach ($buildings as $building) {
      $data[] = [
        'title' => $building->title,
        'slug' => $building->slug,
        'lat' => $building->lat,
        'long' => $building->long,
      ];
    }

    return view('pages.map', [
      'data' => $data,
    ]);
  }
}
