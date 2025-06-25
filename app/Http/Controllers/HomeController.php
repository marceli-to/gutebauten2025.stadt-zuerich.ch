<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Building;

class HomeController extends Controller
{
  public function index(): View
  {
    return view('pages.home', [
      'buildings' => Building::inRandomOrder()->get()
    ]);
  }
}
