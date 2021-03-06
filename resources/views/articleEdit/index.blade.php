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
                  <a href="/article">記事一覧</a>
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
        <form method="POST" action="articleEdit" accept-charset="UTF-8">
          @csrf
          <div id="main">
            <table>
            @foreach($articleEdit as $item)
              <tr>
                <td>タイトル</td>
                <td><input id="mainInput" name="title" value="{{$item->article_title}}"></input></td>
              </tr>
              <tr>
                <td>記事のType</td>
                <td><input id="mainInput" name="articleType" value="{{$item->article_detail_type_name}}"></input></td>
              </tr>
              <tr>
                <td>更新日</td>
                <td><input id="mainInput" name="updateTime" value="{{$item->update_date_time}}"></input></td>
              </tr>
              <tr>
                <td>記事の種類</td>
                <td>
                  <select name='article_type'>
                  <option value='1'>IT</option>
                  <option value='2'>GAME</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>表示フラグ</td>
                <td>
                  <select name='delete_flg'>
                  <option value='0'>表示</option>
                  <option value='1'>非表示</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>　</td>
                <td>　</td>
              </tr>
              <tr>
                <td>　</td>
                <td>　</td>
                <td><button type="submit" name="editComplete" class="btn btn-primary btn-sm">編集を完了する</button></td>
                <td>　</td>
                <td><a href="/article" class="btn btn-primary btn-sm">戻る</a></td>
              </tr>
              <input type="hidden" name="id" value="{{$item->id}}"></input>
              </table>
              <br>
            <textarea name="text" id="getHtmlSauce">{{$insertBlade = file_get_contents('../resources/views/articleDetail/' .$item->id. '.blade.php')}}</textarea>
            @endforeach
          </div>
        </form>
        <!-- 本編終了 -->
        </div>
    </div>
</div>

<script>
  
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</body>
</html>