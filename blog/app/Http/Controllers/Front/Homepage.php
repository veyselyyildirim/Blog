<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;
class Homepage extends Controller
{
    public function index(){
        $data['articles']=Article::orderBy('created_at','DESC')->get();
        $data['categories']=Category::orderBy('name','ASC')->get();
        return view('front.homepage',$data);
    }
    public function single($slug){
        $data['article']=Article::whereSlug($slug)->first() ?? abort(403,'Böyle bir yazı bulunamadı.');




        $data['categories']=Category::orderBy('name','ASC')->get();
        return view('front.single',$data);


    }
}