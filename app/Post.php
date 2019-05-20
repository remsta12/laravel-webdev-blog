<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    # This and post funciton in User.php is how to call from related tables
    public function author(){
      return $this->belongsTo(User::class);
    }

    public function scopeLatestFirst($query){
      return $query->orderBy('created_at', 'desc');
    }
}
