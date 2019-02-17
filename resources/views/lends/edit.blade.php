@extends('layouts.master_auth')
 
@section('content')
<div class="container" style="margin-top: 80px;">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">取り立て情報を編集</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('lends.edit', ['id' => $lend->user_id, 'lend_id' => $lend->id]) }}" method="POST" >
              @csrf
              <div class="form-group">
                <label for="name">名前</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $lend->name  }}" />
              </div>
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') ?? $lend->email }}" />
              </div>
              <div class="form-group">
                <label for="lending_money">貸した額</label>
                <input type="number" min="1" class="form-control" name="lending_money" id="lending_money" value="{{ old('lending_money') ?? $lend->lending_money }}" />
              </div>
              <div class="form-group">
                <label for="status">回収状態</label>
                <select name="status" id="status" class="form-control">
                  @foreach(\App\Lend::STATUS as $key => $val)
                    <option
                        value="{{ $key }}"
                        {{ $key == old('status', $lend->status) ? 'selected' : '' }}
                    >
                      {{ $val['status-label'] }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">更新する</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>


@endsection