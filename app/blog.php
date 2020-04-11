<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
  protected $fillable = [
      'title','body','image','about',
  ];
  public function comments()
  {
    return $this->hasMany(comment::class);
  }
}
