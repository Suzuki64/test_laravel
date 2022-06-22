@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('contents')
<h1>管理システム</h1>
<form class=search_form action="/index" method="post">
@csrf
  <div class=form_name_gender>
    <label class=label_name for="">お名前</label>
    <input class=search_input type="text" name="fullname" value="@if(isset($fullname)){{$fullname}} @endif">
    <label class= label_gender for="">性別</label>
    <input class=radio type="radio" name="gender" id="all_gender" value="" checked>
    <label class=label_radio for='all_gender'>全て</label>
    <input class=radio type="radio" name="gender" id="male" value="男性" @if($gender=="男性") checked @endif>
    <label class=label_radio for="male">男性</label>
    <input class=radio type="radio" name="gender" id="female" value="女性" @if($gender=="女性") checked @endif>
    <label class=label_radio for="female">女性</label>
  </div>
  <div class=form_created_date>
    <label class=label_date for="">登録日</label>
      <input class=search_input type="date" name="created_at_from" value="@if(isset($created_at_from)){{$created_at_from}} @endif">
    &emsp;~&emsp;
      <input class=search_input type="date" name="created_at_to" value="@if(isset($created_at_to)){{$created_at_to}} @endif">
  </div>
  <div class=form_email>
    <label class=label_email for="">メールアドレス</label>
      <input class=search_input type="text" name="email" value="@if(isset($email)){{$email}} @endif">
  </div>
  <div class = button_box>
    <button class=submit_btn type="submit">検索</button><br>
    <a href="/index">リセット</a>
  </div>
</form>

<div class="paginate">
	{{ $items->appends(request()->input())->links() }}
</div>

<table class=search_table>
  <tr class=search_table_tr>
    <th>ID</th>
    <th>お名前</th>
    <th>性別</th>
    <th>メールアドレス</th>
    <th>ご意見</th>
  </tr>
  
  <form action="/index/delete" method="post">
    @csrf
    @foreach ($items as $item)
    <tr>
      <td class=td_id>
        <input class="search_result" type="text" name="id" value="{{$item->id}}">
      </td>
      <td class=td_name>
        <input class="search_result" type="text" name="fullname" value="{{$item->fullname}}">
      </td>
      <td class=td_gender>
        <input class="search_result" type="text" name="gender" value="{{$item->gender}}">
      </td>
      <td class=td_email>
        <input class="search_result" type="email" name="email" value="{{$item->email}}">
      </td>
      <td class=td_opinion>
        @if(mb_strlen($item->opinion)>=25)
        <input class="search_result" type="text" name="opinion" value="{{mb_substr($item->opinion,0,24)}}...">
        <div class=td_opinion_mask>
          <div class=remain_char>{{mb_substr($item->opinion,24,119)}}</div>
        </div>
        @else
        <input class="search_result" type="text" name="opinion" value="{{$item->opinion}}">
        @endif
      </td>
      <td class =button_box>
        <button class="del_btn" type="submit">削除</button>
      </td>
    </tr>
    @endforeach
  </form>
</table>

@endsection