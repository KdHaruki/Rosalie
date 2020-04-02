<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>ロザリーと往く</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>

<!-- ヘッダー部分のメニュー -->
<nav class="navbar navbar-default" style="background-color: #FFFFFF;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-brand" href="/article">
      <img alt="Brand" src="/img/logo.png" style="height: 20px;">
     </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">IT</a></li>
      <li><a href="#">Game</a></li>
    </ul>
  </div>
</nav>
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
                  <a href=""><i class="glyphicon glyphicon-menu-right"></i>{{$item->article_detail_type_name}}</a>
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
            <h1><small>記事一覧</small></h1>
            </div>
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                  <th>Type</th>
                  <th>Title</th>
                  <th>投稿日</th>
                  <th></th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
              @foreach($article as $item)
                <tr onclick="articleClick(this)">
                  <td hidden>{{$item->id}}</td>
                  <td>{{$item->article_detail_type_name}}</td>
                  <td>{{$item->article_title}}</td>
                  <td>{{$item->registration_date_time}}</td>
                  <!--
                  <td>
                    <a href="" class="btn btn-primary btn-sm">閲覧</a>
                    <a href="" class="btn btn-primary btn-sm">編集</a>
                    <a href="" class="btn btn-danger btn-sm">削除</a>
                  </td>
                  -->
                </tr>
              @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// 記事をクリックした時に記事IDを取得して、そのIDのページを開く
function articleClick(getArticleClickParamTd){
  var articleParamTd = getArticleClickParamTd.cells;
  var articleId = articleParamTd[0].innerText;
  location.href = "/article" + "?article=" + articleId;
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</body>
</html>