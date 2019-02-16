@extends('layouts.master_auth')
 
@section('content')
<div class="container" style="margin-top: 80px;">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">取り立て情報を追加！！</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('lends.create', ['id' => $user_id]) }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">名前</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" />
              </div>
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="lending_money">貸した額</label>
                <input type="number" min="0" value="0" class="form-control" name="lending_money" id="lending_money" value="{{ old('lending_money') }}" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">取り立て！</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>

@endsection