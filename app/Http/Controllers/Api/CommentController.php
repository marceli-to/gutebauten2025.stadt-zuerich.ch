<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Actions\Comment\Store as StoreAction;

class CommentController extends Controller
{
  public function store(CommentRequest $request)
  {
    app(StoreAction::class)->execute($request);
    return response()->json(['message' => 'Comment stored']);
  }
}
