<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Space;
use Illuminate\Support\Facades\App;

class SiteController extends Controller
{

    public function home($lang)
    {

        $teams = [
            [
                "name" => 'Oussama',
                "name_ar" => "أسامة",
                "post" => 'Developer',
                "post_ar" => "مطور",
                "image" => asset('assets/imgs/oussama.jpg')
            ],
            [
                "name" => 'FastX',
                "name_ar" => "فاست",
                "post" => 'Developer',
                "post_ar" => "مطور",
                "image" => asset('assets/imgs/fast.png')
            ],
            [
                "name" => 'Musaed',
                "name_ar" => "مساعد",
                "post" => 'Developer',
                "post_ar" => "مطور",
                "image" => asset('assets/imgs/musaed.jpg')
            ],
            [
                "name" => 'Fury',
                "name_ar" => "فيوري",
                "post" => 'Developer',
                "post_ar" => "مطور",
                "image" => asset('assets/imgs/fury.jpg')
            ],
            [
                "name" => 'Abdulaziz',
                "name_ar" => "عبد العزيز",
                "post" => 'Developer',
                "post_ar" => "مطور",
                "image" => asset('assets/imgs/abdulaziz.gif')
            ]
            ];

        App::setLocale($lang);

        $pages = Page::where('is_published',1)->orderBy('updated_at', 'desc')->take(5)->get();
        $faqs = Faq::where('published',1)->get();

        return view('welcome',compact('pages','faqs','teams'));
    }

    public function category($lang,$slug)
    {
        App::setLocale($lang);
        $category = Category::where('slug', $slug)->orWhere('slug_ar',$slug)->first();

        if(empty($category)) {
            abort(404);
        }

        return view('category', compact('category'));
    }

    public function page($lang,$space,$group = null,$page = null)
    {

        App::setLocale($lang);

        $foundSpace = Space::where('slug', $space)->orWhere('slug_ar',$space)->first();


        $foundGroup = $foundSpace->groups()->orderBy('created_at')->first();

        if(empty($foundGroup))  abort(404);

        $foundPage = $foundGroup->pages->first();

        if(empty($foundPage))  abort(404);

        if(!empty($group) && !empty($page)) {
            $foundGroup = $foundSpace->groups()->where('slug', $group)->orWhere('slug_ar', $group)->first();
            $foundPage = $foundGroup->pages()->where('slug', $page)->orWhere('slug_ar', $page)->first();
        }



        return view('docs', compact('foundSpace','foundPage','foundPage'));

    }

    public function contact($lang)
    {
        App::setLocale($lang);
        return view('contact');
    }

}
