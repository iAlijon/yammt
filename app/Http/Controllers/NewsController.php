<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show($id){
        $news = News::where('status',1)->where('category_id', $id)->orderBy('id', 'desc')->paginate(10);
        dd($news);
        return view('front.news.show', compact('news'));
    }
}
