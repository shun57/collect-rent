@extends('layouts.master_auth')
 
@section('content')
  <div style="margin-top: 80px;">
      <h3>マイページ</h3>
      <table class="table">
          <tr>
              <td>名前</td>
              <td>メールアドレス</td>
          </tr>
          <tr>
              <th>{{$user->name}}</th>
              <th>{{$user->email}}</th>
          </tr>
      </table>
      <div style="text-align: center;">
        <h4>貸している総額</h4>
        <p><span style="font-size: 60px;">{{$all_lending_money}}</span>円</p>
      </div>
  </div>
  
@endsection