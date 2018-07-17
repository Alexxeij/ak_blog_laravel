<?php
namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Post;

class ArticleController extends Controller
{
    public function index(){

        $all = Article::select(['id','names'])->get();

         dump($all);

        return view('articles.article') ->with(['all' => $all]);
    }

}