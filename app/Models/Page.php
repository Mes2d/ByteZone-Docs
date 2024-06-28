<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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

    public function content()
    {
        if(App::getLocale() == 'ar') return $this->content_ar;
        return $this->content;
    }


    public function group()
    {
        return $this->belongsTo(Group::class);
    }



}
