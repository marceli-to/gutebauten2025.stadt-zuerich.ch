<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Vote\Check as CheckAction;
use App\Actions\Vote\Store as StoreAction;
use App\Actions\Vote\Remove as RemoveAction;

class VoteController extends Controller
{
  public function check(Request $request, string $hash, string $slug)
  {
    $request->merge([
      'hash' => $hash,
      'slug' => $slug,
    ]);

    $request->validate([
      'hash' => 'required|string|size:32',
      'slug' => 'required|exists:buildings,slug',
    ]);
    return response()->json(
      (new CheckAction())->execute($request)
    );
  }

  public function store(Request $request)
  {
    $request->validate([
      'hash' => 'required|string|size:32',
      'slug' => 'required|exists:buildings,slug',
    ]);
    (new StoreAction())->execute($request);
    return response()->json(['message' => 'Vote stored']);
  }

  public function remove(Request $request)
  {
    $request->validate([
      'hash' => 'required|string|size:32',
      'slug' => 'required|exists:buildings,slug',
    ]);
    (new RemoveAction())->execute($request, $request->hash);
    return response()->json(['message' => 'Vote removed']);
  }
}
