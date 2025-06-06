<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Building;

class BuildingController extends Controller
{
  public function index(Building $building): View
  {
    return view('pages.building', compact('building'));
  }
}
