
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
                <li>
                  <a href="/articleAdd"><i class="glyphicon glyphicon-menu-right"></i>新規作成</a>
                </li>
              </ul>
            </div>
            <div class="panel panel-default" id="twitter-view-limited">
                <a class="twitter-timeline" href="https://twitter.com/rosalie_as_r?ref_src=twsrc%5Etfw">Tweets by rosalie_as_r</a>
            </div>
        </div>
        <!-- main -->
        <div class="col-md-9">
            <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
            <h1><small>ログイン</small></h1>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8" id="main">
                        <div class="card">
                            <div class="card-header">Dashboard</div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                You are logged in!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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




