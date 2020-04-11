<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
class product extends Model
{

  protected $fillable = [
      'name','price','discount','iamge','department_id','category_id'
  ];
public function department()
{
  return $this->belongsTo(department::class);
}
public function category()
{
  return $this->belongsTo(category::class);
}
public function comments()
{
  return $this->hasMany(comment::class);
}
public function likes()
{
  return $this->hasMany(like::class);
}

 }
