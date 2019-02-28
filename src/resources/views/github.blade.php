<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>github</title>
</head>
<body>
  <form action="/gituser" method="POST">
    {{ csrf_field() }}
    <div>なまえ：<input type="text" name="name" value="{{$user->name}}"></div>
    <div>コメント：<input type="text" name="comment" value="{{$user->comment}}"></div>
    <input type="submit" value="Confirm">
  </form>

  <div>Your name is {{ $nickname }}.</div>
  <div>Your token is {{ $token }}.</div>
  <div>Your repositories</div>
  <ul>
  @foreach ($repos as $repo)
    <li>{{ $repo }}</li>
  @endforeach
  </ul>

  <form action="/github/issue" method="post">
    {{ csrf_field() }}
    <div>repo : <input type="text" name="repo"></div>
    <div>title : <input type="text" name="title"></div>
    <div>body : <input type="text" name="body"></div>
    <input type="submit" value="Confirm">
  </form>
</body>
</html>
