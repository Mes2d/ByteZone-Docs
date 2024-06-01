<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'name_ar', 'slug', 'slug_ar', 'description', 'description_ar', 'is_published',"image","category_id"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
