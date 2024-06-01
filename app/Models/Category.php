<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'name_ar', 'slug', 'slug_ar', 'description', 'description_ar', 'is_published',"image"
    ];

    public function spaces()
    {
        return $this->hasMany(Space::class);
    }


}
