<!-- エラーメッセージ -->
@if ($errors->any())
<ul>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
</ul>
@endif

<!-- フォーム -->
<form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">
  <!-- アップロードした画像 -->
  @isset ($images)
  @foreach ($images as $img)
  <div>
    <img src="{{ asset('storage/'.$img->filename) }}">
  </div>
  @endforeach
  @endisset

  <label for="photo">画像ファイル:</label>
  <input type="file" class="form-control" name="file">
  <br>
  <hr>
  {{ csrf_field() }}
  <button class="btn btn-success"> Upload </button>
</form>
