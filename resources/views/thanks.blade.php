@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('contents')
<div class=thanks_box>
  <div class= thanks_message>
    ご意見頂きありがとうございました。
  </div>
  <button>
    <a href="/">トップページへ</a>
  </button>
</div>
@endsection