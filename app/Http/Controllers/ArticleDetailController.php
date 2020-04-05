<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleDetailController extends Controller
{
    public function index($getArticleId = null){
        // 記事一覧SQL　ITに関する情報のみ
        if($getArticleId != null){
            $articleIt = DB::table('article')
            ->leftJoin('article_type', 'article.article_type', '=', 'article_type.article_type_id')
            ->leftJoin('article_detail_type', 'article.article_detail_type', '=', 'article_detail_type.article_detail_type_id')
            ->where('id', '=', $getArticleId)
            ->get();
        }else{
            $articleIt = DB::table('article')
            ->leftJoin('article_type', 'article.article_type', '=', 'article_type.article_type_id')
            ->leftJoin('article_detail_type', 'article.article_detail_type', '=', 'article_detail_type.article_detail_type_id')
            ->get();
        }
        // MenuSQL　ITに関する情報のみ
        $articleItDetailType = DB::table('article_detail_type')
        ->leftJoin('article', 'article.article_detail_type', '=', 'article_detail_type.article_detail_type_id')
        ->where('article_type_set_id', '=', 1)
        ->get();
        // 記事をクリックした時のIDを取得してそのページへ遷移
        $articleDetail = "articledetail.".$getArticleId;
        return view($articleDetail,['article' => $articleIt],['article_detail_type' => $articleItDetailType]);
    }
}
