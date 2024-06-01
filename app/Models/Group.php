<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['title','title_ar','slug','slug_ar','space_id','is_published'];

    public function space()
    {
        return $this->belongsTo(Space::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
