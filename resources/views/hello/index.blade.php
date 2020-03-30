<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>test</title>
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
     <a class="navbar-brand" href="#">
      <img alt="Brand" src="/img/logo.png" style="height: 20px;">
     </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">IT</a></li>
      <li><a href="#">ゲーム</a></li>
    </ul>
  </div>
</nav>
 
<div class="container">
    <div class="row" id="content" style="padding:80px 0 0 0">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                Menu
                </div>
            <ul class="nav nav-pills nav-stacked">
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> PHP</a></li>
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> HTML</a></li>
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> CSS</a></li>
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> CakePHP</a></li>
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> Laravel</a></li>
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> SQL</a></li>
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> JavaScript</a></li>
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> Java</a></li>
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> Flutter</a></li>
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> Linux</a></li>
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> Docker</a></li>
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> AdobeXD</a></li>
                <li><a href=""><i class="glyphicon glyphicon-menu-right"></i> その他</a></li>
            </ul>
            </div>
            <div class="panel panel-default" id="twitter-view-limited">
                <a class="twitter-timeline" href="https://twitter.com/rosalie_as_r?ref_src=twsrc%5Etfw">Tweets by rosalie_as_r</a>
            </div>
        </div>
        <!-- main -->
        <div class="col-md-9">
            <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
            <h1><small>タイトル</small></h1>
            </div>
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>No</th>
                <th>name</th>
                <th>email</th>
                <th>tel</th>
                <th>opration</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>01</td><td>hoge foo</td><td>hoge@foo.com</td><td>06-1234-5678</td>
                <td>
                    <a href="" class="btn btn-primary btn-sm">詳細</a>
                    <a href="" class="btn btn-primary btn-sm">編集</a>
                    <a href="" class="btn btn-danger btn-sm">削除</a>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</body>
</html>