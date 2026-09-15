<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class G_Blog extends Model
{
    use HasFactory;
    protected $table = 'g_blog';
    protected $guarded = [];


    public function blog_id()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }
}
