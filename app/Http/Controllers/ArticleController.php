<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index(){

    // 記事一覧SQL　ITに関する情報のみ
    $articleIt = DB::table('article')
    ->leftJoin('article_type', 'article.article_type', '=', 'article_type.article_type_id')
    ->leftJoin('article_detail_type', 'article.article_detail_type', '=', 'article_detail_type.article_detail_type_id')
    // ->where('article_type_set_id', '=', 1)
    ->get();

    // MenuSQL　ITに関する情報のみ
    $articleItDetailType = DB::table('article_detail_type')
    ->leftJoin('article', 'article.article_detail_type', '=', 'article_detail_type.article_detail_type_id')
    ->where('article_type_set_id', '=', 1)
    ->get();
        return view('article.index',['article' => $articleIt],['article_detail_type' => $articleItDetailType]);
    }
}
