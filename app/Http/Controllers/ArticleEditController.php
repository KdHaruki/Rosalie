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

        // 詳細画面の編集完了を押下した時、DBにある記事情報をUpdateして関連する「X.balde.php」の中身を上書きする。
        if($request->isMethod('post')){
            file_put_contents("../resources/views/articleDetail/$request->id.blade.php", $request->text);
            return view('articleEdit.complete');
        }

        // 一覧から記事を押下した遷移先の情報を取得
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