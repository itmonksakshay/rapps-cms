<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RappPost extends Model{
	
  use HasFactory;
  
  protected $table = 'rapp_posts';
  
  protected $fillable = ['author_id','title','body','slug','active'];
    
  protected $guarded = [];

  public function comments(){
	  
    return $this->hasMany(RappComment::class, 'post_id');
  }
  
  // returns the instance of the user who is author of that post
  public function author(){
    return $this->belongsTo(RappUser::class, 'author_id');
  }


}
