<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index(Request $request){
        $getTypeSelectName = $request->input('type');

        if(!empty($getTypeSelectName)){
            $getTypeId = DB::table('article_detail_type')
            ->where('article_detail_type_name', '=', $getTypeSelectName)
            ->get();
            $articleDetailTypeId = json_decode(json_encode($getTypeId ), true);
            $articleDetailTypeId = $articleDetailTypeId[0]['article_detail_type_id'];
            
            $articleIt = DB::table('article')
            ->leftJoin('article_type', 'article.article_type', '=', 'article_type.article_type_id')
            ->leftJoin('article_detail_type', 'article.article_detail_type', '=', 'article_detail_type.article_detail_type_id')
            ->where('article_detail_type_id', '=', $articleDetailTypeId)
            ->where('delete_flg', '=', 0)
            ->get();
        }else{
            $articleIt = DB::table('article')
            ->leftJoin('article_type', 'article.article_type', '=', 'article_type.article_type_id')
            ->leftJoin('article_detail_type', 'article.article_detail_type', '=', 'article_detail_type.article_detail_type_id')
            ->where('delete_flg', '=', 0)
            ->get();
        }

        // MenuSQL　ITに関する情報のみ
        $articleItDetailType = DB::table('article_detail_type')
        ->leftJoin('article', 'article.article_detail_type', '=', 'article_detail_type.article_detail_type_id')
        ->where('article_type_set_id', '=', 1)
        ->get();

        $date = [
            'article' => $articleIt,
            'article_detail_type' => $articleItDetailType
        ];
        return view('article.index',$date);
    }
}
