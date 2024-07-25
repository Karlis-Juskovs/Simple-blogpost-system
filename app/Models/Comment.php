<?php

namespace App\Models;

use App\Traits\HasOwner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use HasOwner;

    protected $fillable = [
        'content',
        'owner_id',
        'blog_post_id'
    ];
}
