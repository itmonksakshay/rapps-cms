<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RappComment extends Model
{
    use HasFactory;
    
  protected $table = 'rapp_comments';
    
  protected $guarded = [];
  // user who has commented

  public function user(){
    return $this->belongsTo(RappUser::class, 'user_id');
  }
  
  // returns post of any comment
  public function post(){
    return $this->belongsTo(RappPost::class, 'post_id');
  }

    
}
