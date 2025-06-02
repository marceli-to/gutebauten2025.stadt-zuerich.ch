<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'comment',
    'published',
    'building_id',
  ];

  public function building()
  {
    return $this->belongsTo(Building::class);
  }

  public function scopePublished($query)
  {
    return $query->where('published', true);
  }

  public function scopeDrafts($query)
  {
    return $query->where('published', false);
  }

}
