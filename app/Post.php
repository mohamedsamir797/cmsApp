<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
   use SoftDeletes ;
   protected $fillable = ['title','desc','content','image','cat_id','user_id'];
   public function category()
   {
       return $this->belongsTo(Category::class,'cat_id');
   }
   public function tags(){
       return $this->belongsToMany(Tag::class);
   }
   public function hasId($tagID){
       return in_array($tagID,$this->tags->pluck('id')->toArray());
   }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments(){
        return $this->belongsTo(Comment::class,'post_id');
    }
}
