<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">

  <div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">少額取り立て屋</a>
  </div>
<ul>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
@if(Auth::check())
  <li><a href="{{route('lends.create',['id' => Auth::user()->id])}}">取り立てる</a></li>
  <li><a href="{{route('lends.index',['id' => Auth::user()->id])}}">取り立て一覧</a></li>
  <li><a href="{{route('user.profile')}}">マイページ</a></li>
  <li><a href="{{route('user.logout')}}">ログアウト</a></li>
@else
  <li><a href="{{route('user.signup')}}"><i aria-hidden="true"></i>新規登録</a></li>
  <li><a href="{{route('user.signin')}}"><i aria-hidden="true"></i>ログイン</a></li>
@endif
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>