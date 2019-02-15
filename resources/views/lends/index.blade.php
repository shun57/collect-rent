@extends('layouts.master_auth')
 
@section('content')
  <div style="margin-top: 80px;">
    <h3>取り立て一覧</h3>
    <table class="table">
    <thead>
    <tr>
      <th>名前</th>
      <th>アドレス</th>
      <th>貸した金額</th>
      <th>貸した日</th>
      <th>回収状況</th>
      <th>請求頻度</th>
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
          <td>
            <span class="label {{ $lend->interval_class }}">{{ $lend->interval_label }}</span>
          </td>
          <td><a href="#">編集</a></td>
          <td><a href="#">削除</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  
@endsection