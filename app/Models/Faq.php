<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answer',
        'published',
        'question_ar',
        'answer_ar'
    ];


    public function question()
    {
        if(App::getLocale() == 'ar') return $this->question_ar;
        return $this->question;
    }

    public function answer()
    {
        if(App::getLocale() == 'ar') return $this->answer_ar;
        return $this->answer;
    }


}
