<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
  protected $fillable = [
      'comment','blog_id','user_id','product_id',
  ];
  public function post()
  {
    return $this->belongsTo(blog::class, 'blog_id');
  }
  public function product()
  {
    return $this->belongsTo(product::class);
  }
  public function user()
  {
    return $this->belongsTo(user::class);
  }
}
