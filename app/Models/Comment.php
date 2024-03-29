<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'commentable_id', 'commentable_type' , 'parent_id' , 'user_id'];

    public function commentable()
    {
        return $this->morphTo();
    }
    public function user(){
        return $this->belongsTo(User::class) ;
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }


    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

}
