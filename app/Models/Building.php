<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
  protected $fillable = [
    'slug',
    'title',
    'short_title',
    'short_description',
    'year',
    'lat',
    'long',
    'maps',
  ];

  public function comments()
  {
    return $this->hasMany(Comment::class)->where('published', true)->orderBy('created_at', 'desc');
  }

  public function voters()
  {
    return $this->belongsToMany(Voter::class);
  }
}
