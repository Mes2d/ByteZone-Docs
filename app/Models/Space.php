<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Space extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'name_ar', 'slug', 'slug_ar', 'description', 'description_ar', 'is_published',"image","category_id"
    ];


    public function name()
    {
        if(App::getLocale() == 'ar') return $this->name_ar;
        return $this->name;
    }

    public function slug()
    {
        if(App::getLocale() == 'ar') return $this->slug_ar;
        return $this->slug;
    }

    public function description()
    {
        if(App::getLocale() == 'ar') return $this->description_ar;
        return $this->description;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }



}
