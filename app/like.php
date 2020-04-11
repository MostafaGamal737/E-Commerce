<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
  public function product()
  {
    return $this->belongsTo(product::class);
  }
  public function user()
  {
    return $this->belongsTo(user::class);
  }
}
