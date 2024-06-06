<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_name',
        'project_images',
        'project_framework',
        'portfoliocategory_id',
    ];
    public function portfoliocategory(): BelongsTo
    {
        return $this->belongsTo(Portfoliocategory::class);
    }
}
