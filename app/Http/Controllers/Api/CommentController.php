<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Comment\Get as GetCommentsAction;
use App\Actions\Comment\Delete as DeleteCommentAction;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
  public function get()
  {
    $comments = (new GetCommentsAction())->execute();
    return response()->json([
      'published' => CommentResource::collection($comments['published']),
      'drafts' => CommentResource::collection($comments['drafts']),
      'deleted' => CommentResource::collection($comments['deleted']),
    ]);
  }

  public function destroy(Request $request)
  {
    (new DeleteCommentAction())->execute(
      Comment::findOrFail($request->id)
    );
    return response()->json([
      'message' => 'Comment deleted successfully',
    ]);
  }
}
