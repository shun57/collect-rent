@extends('layouts.master_auth')
 
@section('content')
  <div style="margin-top: 80px;">
      <h3>マイページ</h3>
      <table class="table table-striped">
          <tr>
              <th>名前</th>
              <td>{{Auth::user()->name}}</td>
          </tr>
          <tr>
              <th>メールアドレス</th>
              <td>{{Auth::user()->email}}</td>
          </tr>
      </table>
  </div>
  
@endsection