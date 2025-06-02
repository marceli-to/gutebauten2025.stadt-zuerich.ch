<?php
namespace App\Actions\Comment;
use App\Models\Comment;

class Delete
{
  public function execute(Comment $comment): void
  {
    $comment->delete();
  }
}
