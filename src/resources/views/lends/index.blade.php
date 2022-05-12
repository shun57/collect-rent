@extends('layouts.master_auth')
 
@section('content')
  <div style="margin-top: 80px;">
    <h3>取り立て一覧</h3>
    <p>未回収の場合、貸した人には、毎日12:00に催促メールが届きます。<br>催促メールを止めるには、削除してください。</p>
    <table class="table">
    <thead>
    <tr>
      <th>名前</th>
      <th>アドレス</th>
      <th>貸した金額</th>
      <th>貸した日</th>
      <th>回収状況</th>
    </tr>
    </thead>
    <tbody>
      @foreach($lends as $lend)
        <tr>
          <td>{{ $lend->name }}</td>
           <td>{{ $lend->email }}</td>
           <td>{{ $lend->lending_money }}円</td>
           <td>{{ $lend->formatted_created_at }}</td>
          <td>
            <span class="label {{ $lend->status_class }}">{{ $lend->status_label }}</span>
          </td>
          <td><a href="{{ route('lends.edit', ['id' => $lend->user_id, 'lend_id' => $lend->id]) }}" class="btn btn-default">編集</a></td>
          <td><form method="post" action="{{route('lends.delete',['id' => $lend->user_id, 'lend_id' => $lend->id])}}">
              {{ csrf_field() }}
              <input type="submit" value="削除" onclick='return confirm("本当に削除しますか？");' class="btn btn-default">
              </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  
@endsection