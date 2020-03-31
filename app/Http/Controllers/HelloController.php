<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(){
    $users = DB::table('article')
    ->leftJoin('article_type', 'article.article_type', '=', 'article_type.article_type_id')
    ->leftJoin('article_detail_type', 'article.article_detail_type', '=', 'article_detail_type.article_detail_type_id')
    ->get();
        return view('hello.index',['users' => $users]);
    }
}
