<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleAddController extends Controller
{
    // ログイン認証
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        // 新規登録画面にて登録ボタンを押下した場合、DBの記事テーブルの最後のID+1のbladeを作成する。
        if($request->isMethod('post')){
        $articleLustId = DB::table('article')
            ->orderBy('id', 'desc')
            ->first();
            $articleLustId = (int)$articleLustId->id + 1;
            file_put_contents("../resources/views/articleDetail/$articleLustId.blade.php", $request->text);

            // 記事タイプの取得
            $getArticleTitle = $request->input('articleType');
            $selectArticleTitle = DB::table('article_detail_type')
            ->where('article_detail_type_name', 'LIKE', $getArticleTitle)
            ->get();
            $selectArticleTitle = json_decode(json_encode($selectArticleTitle), true);

            if($selectArticleTitle == NULL){
                $errorMessage = "存在しない記事タイプです";
            }else{
                DB::table('article')->insert(
                ['id' => $articleLustId,
                'article_type' => $request->input('article_type'),
                'article_detail_type' => (int)$selectArticleTitle[0]["article_detail_type_id"],
                'article_title' => $request->input('title'),
                'registration_date_time' => date("Y/m/d"),
                'update_date_time' => date("Y/m/d"),
                'delete_flg' => $request->input('delete_flg')]
                );
  
                DB::table('article')
                ->where('id', $request->id)
                ->update(
                    ['article_detail_type' => (int)$selectArticleTitle[0]["article_detail_type_id"]]
                );
            }

            // 記事のアップデート
            DB::table('article')
            ->where('id', $request->id)
            ->update(
                ['update_date_time' => date("Y/m/d")]
            );

            $deleteFlg = $request->input('delete_flg');
            // 記事のアップデート
            DB::table('article')
            ->where('id', $request->id)
            ->update(
                ['delete_flg' => $deleteFlg]
            );
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

        $date = [
            'articleEdit' => $articleEdit,
            'article_detail_type' => $articleItDetailType
        ];

        return view('articleAdd.index',['articleEdit' => $articleEdit],['article_detail_type' => $articleItDetailType]);
    }
}
