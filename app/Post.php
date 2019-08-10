<?php

namespace App;

use GrahamCampbell\Markdown\Facades\Markdown;
use Carbon\Carbon;
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

    public function scopePublished($query){
      return $query->where('created_at', '<=', Carbon::now());
    }

    public function getBodyHtmlAttribute($value){
      return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    public function getExcerptHtmlAttribute($value){
      return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
    }

    
}
