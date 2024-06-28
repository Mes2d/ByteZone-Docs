<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['title','title_ar','slug','slug_ar','space_id','is_published'];


    public function title()
    {
        if(App::getLocale() == 'ar') return $this->title_ar;
        return $this->title;
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


    public function space()
    {
        return $this->belongsTo(Space::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }



}
