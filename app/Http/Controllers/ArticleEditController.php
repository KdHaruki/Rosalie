<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleEditController extends Controller
{
    // ログイン認証
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $getSelectArticleId = $request->input('id');
        if(!empty($getSelectArticleId)){
            $articleEdit = DB::table('article')
            ->leftJoin('article_type', 'article.article_type', '=', 'article_type.article_type_id')
            ->leftJoin('article_detail_type', 'article.article_detail_type', '=', 'article_detail_type.article_detail_type_id')
            ->where('id', '=', $getSelectArticleId )
            ->get();
        }else{
            $articleEdit = DB::table('article')
            ->leftJoin('article_type', 'article.article_type', '=', 'article_type.article_type_id')
            ->leftJoin('article_detail_type', 'article.article_detail_type', '=', 'article_detail_type.article_detail_type_id')
            ->get();
        }
        // MenuSQL　ITに関する情報のみ
        $articleItDetailType = DB::table('article_detail_type')
        ->leftJoin('article', 'article.article_detail_type', '=', 'article_detail_type.article_detail_type_id')
        ->where('article_type_set_id', '=', 1)
        ->get();
        return view('articleEdit.index',['articleEdit' => $articleEdit],['article_detail_type' => $articleItDetailType]);
    }
}
