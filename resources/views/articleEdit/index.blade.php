<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>ロザリーと往く</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>

<?php require('../packages/header.php'); ?>
<div class="container">
    <div class="row" id="content" style="padding:80px 0 0 0">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a href="/article">Menu</a>
                </div>
              <ul class="nav nav-pills nav-stacked">
                @foreach($article_detail_type as $item)
                <li>
                  <a href="/article?type={{$item->article_detail_type_name}}"><i class="glyphicon glyphicon-menu-right"></i>{{$item->article_detail_type_name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="panel panel-default" id="twitter-view-limited">
                <a class="twitter-timeline" href="https://twitter.com/rosalie_as_r?ref_src=twsrc%5Etfw">Tweets by rosalie_as_r</a>
            </div>
        </div>
        <!-- main -->
        <div class="col-md-9">
            <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
              <h1><small>
                編集
              </small></h1>
            </div>
        <!-- ここから本編 -->
          <div id="main">
            <table>
            @foreach($articleEdit as $item)
              <tr><td><input value="{{$item->article_type_name}}"></input></td></tr>
              <tr><td><input value="{{$item->article_detail_type_name}}"></input></td></tr>
              <tr><td><input value="{{$item->article_title}}"></input></td></tr>
              <tr><td><input value="{{$item->update_date_time}}"></input></td></tr>
              <tr><td><input value="{{$item->delete_flg}}"></input></td></tr>
            @endforeach
            </table>
          </div>
        </div>
    </div>
</div>

<script>
// 記事をクリックした時に記事IDを取得して、そのIDのページを開く
function articleClick(getArticleClickParamTd){
  var articleParamTd = getArticleClickParamTd.cells;
  var articleId = articleParamTd[0].innerText;
  location.href = "/article" + "/" + articleId;
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</body>
</html>