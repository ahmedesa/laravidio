<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['user_id', 'body', 'is_published ', 'video_id', 'created_at', 'updated_at'];
}
