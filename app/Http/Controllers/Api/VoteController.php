<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VoteRequest;
use App\Actions\Vote\Check as CheckAction;
use App\Actions\Vote\Store as StoreAction;
use App\Actions\Vote\Remove as RemoveAction;

class VoteController extends Controller
{
  public function check(VoteRequest $request)
  {
    return response()->json(
      app(CheckAction::class)->execute($request)
    );
  }

  public function store(VoteRequest $request)
  {
    app(StoreAction::class)->execute($request);
    return response()->json(['message' => 'Vote stored']);
  }

  public function remove(VoteRequest $request)
  {
    app(RemoveAction::class)->execute($request);
    return response()->json(['message' => 'Vote removed']);
  }
}
