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
                @foreach($article as $item)
                  {{$item->article_title}}
                @endforeach
              </small></h1>
            </div>
        <!-- ここから本編 -->
          <div id="main" onchange="DifferencePoint()">
            <p>Enemy（相手）とMyself（自分）のポイントを入力することで差分が計算されます。</p>
            <p>Sランクサークル 降格31位</p>
            <p>Aランクサークル 降格71位 昇格20位</p>
            <p>Bランクサークル 昇格30位</p>
            <p>例：Aランクで維持をしたい場合、Enemyに20位のサークルのポイント、Myselfに自分サークルのポイント</p>
            <p>それぞれ入力することで、エクシーズで獲得して問題ないポイントが表示されます。</p>
            <table>
              <tr>
                <td><input id="mainInput" class="enemyCirclePoint" type="text" size="10" placeholder="Enemy" value=""></td>
              </tr>
              <tr>
                <td><input id="mainInput" class="allyCirclePoint" type="text" size="10" placeholder="Myself" value=""></td>
              </tr>
              <tr>
                <td>勝利時獲得可能ポイント：<input id="mainInput"class="differenceWinPoint" type="text" name="name" size="10" maxlength="20"></td>
              </tr>
              <tr>
                <td>敗北時獲得可能ポイント：<input id="mainInput" class="differenceLosePoint" type="text" name="name" size="10" maxlength="20"></td>
              </tr>
            </table>
          </div>
          <!-- 本編終了 -->
        </div>
    </div>
</div>

<script>
/*****************************************************************
サークルポイント差分の計算ボタンが押されたら、その結果を表示
*****************************************************************/
function DifferencePoint(){
  var enemyCirclePoint = $(".enemyCirclePoint").val();
  var allyCirclePoint = $(".allyCirclePoint").val();
  var differencePoint = enemyCirclePoint - allyCirclePoint;
  if(differencePoint < 0){
    alert('入力値が正しくありません：' + differencePoint);
  }else{
    var differenceWinPoint = Math.floor(differencePoint / 1.5);
    $('.differenceWinPoint').val(differenceWinPoint);
    $('.differenceLosePoint').val(differencePoint);
  }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</body>
</html>