<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
  public function toArray(Request $request): array
  {
    return [
      'id' => $this->id,
      'date' => \Carbon\Carbon::parse($this->created_at)->format('d.m.Y – H:i'),
      'comment' => $this->comment,
      'building' => $this->building->title,
    ];
  }
}
