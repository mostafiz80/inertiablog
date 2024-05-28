<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'category_image',
        'category_slug',
    ];
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
