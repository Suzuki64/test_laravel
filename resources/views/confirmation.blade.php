@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirmation.css') }}">
@endsection

@section('contents')
<h1>内容確認</h1>
<form action=? method="post">
@csrf
  <table>
    <tr>
      <th class=name>
        <label for="">お名前</label>
      </th>
      <td>
        <div class=form_flex>
          <div class=form_box>
            {{ $fullname }}
            <input type="hidden" name="fullname" value="{{$fullname}}">
            <input type="hidden" name="name1" value="{{$inputs['name1']}}">
            <input type="hidden" name="name2" value="{{$inputs['name2']}}">
          </div>
        </div>
      </td>
    </tr>

    <tr>
      <th class=gender>
        <label for="">性別</label>
      </th>
      <td>
        <div class=radiobox>
          @if($inputs['gender']==1)
          <P>男性</P>
          <input type="hidden" name="gender" value="1">
          @elseif($inputs['gender']==2)
          <P>女性</P>
          <input type="hidden" name="gender" value="2">
          @endif
        </div>
      </td>
    </tr>

    <tr>
      <th class=email>
        <label for="">メールアドレス</label>
      </th>
      <td>
        <div class=form_flex>
          <div class=form_box>
          {{ $inputs['email'] }}
          <input type="hidden" name="email" value="{{$inputs['email']}}">
          </div>
        </div>
      </td>
    </tr> 

    <tr>
    <th class=postcode>
      <label for="">郵便番号</label>
    </th>
      <td>
        <div class=form_flex>
          <div class = zipmark>〒&emsp;</div>  
            <div class=form_box>
              {{ $inputs['postcode'] }}
              <input type="hidden" name="postcode" value="{{$inputs['postcode']}}">
          </div>
        </div>
      </td>
    </tr>

    <tr>
      <th class=address>
        <label for="">住所</label>
      </th>
      <td>
        <div class=form_flex>
          <div class=form_box>
            {{ $inputs['address'] }}
            <input type="hidden" name="address" value="{{$inputs['address']}}">
          </div>
        </div>
      </td>
    </tr>
    
    <tr>
      <th class=building_name>
        <label for="">建物名</label>
      </th>
      <td>
        <div class=form_flex>
          <div class=form_box>
            {{ $inputs['building_name'] }}
            <input type="hidden" name="building_name" value="{{$inputs['building_name']}}">
          </div>
        </div>
      </td>
    </tr>
    
    <tr>
      <th class=opinion>
        <label for="">ご意見</label>
      </th>
      <td>
        <div class=form_flex>
          <div class=form_box>
            {{ $inputs['opinion'] }}
            <input type="hidden" name="opinion" value="{{$inputs['opinion']}}">
        </div>
      </div>
      </td>
    </tr>
  </table>
  <div class=button_box>
    <button class=button_submit type="submit" formaction="/thanks" >送信</button>
  </div>
  <div class=button_box>
    <button class=button_revise type="submit" formaction="/revise">修正する</button>
  </div>
</form>
@endsection

