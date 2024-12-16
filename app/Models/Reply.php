<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function comment(){
        return $this->belongsTo(Comment::class,'comment_id','id');
    }
}
