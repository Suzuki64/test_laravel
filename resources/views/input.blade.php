@extends('layouts.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/input.css') }}">
@endsection

@section('contents')
<h1>お問い合わせ</h1>
<form action="/confirm" method="post">
  @csrf
  <table>
    <tr>
      <th class=name>
        <label for="">お名前<span>&nbsp;※</span></label>
        @error('name1')
        <div class=error_message> {{$message}}</div>
        @enderror
        @error('name2')
        <div class=error_message> {{$message}}</div>
        @enderror
      </th>
      <td>
        <div class=form_flex>
          <div class=form_box>
            <input type="text" name="name1" value="@isset($inputs){{$inputs['name1']}} @else{{old('name1')}} @endisset">
            <p>&emsp;例）山田</p> 
          </div>
          <div class=form_box>
          <input type="text" name="name2" value="@isset($inputs){{$inputs['name2']}} @else{{old('name2')}}  @endisset">
            <p>&emsp;例）太郎</p>
            </p>
          </div>
        </div>
      </td>
    </tr>

    <tr>
      <th class=gender>
        <label for="">性別<span>&nbsp;※</span></label>
        @error('gender')
        <div class=error_message> {{$message}}</div>
        @enderror
      </th>
      <td>
        @isset($inputs)
          <input class=radio type="radio" name="gender" id="male" value="1" @if($inputs['gender'] == 1) checked @endif>
          <label class=label_radio for="male">男性</label>
          <input class=radio type="radio" name="gender" id="female" value="2" @if($inputs['gender'] == 2) checked @endif>
          <label class=label_radio for="female">女性</label>
        @else
          <input class=radio type="radio" name="gender" id="male" value="1" {{ old('gender') == 2 ? '' : 'checked' }}>
          <label class=label_radio for="male">男性</label>
          <input class=radio type="radio" name="gender" id="female" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>
          <label class=label_radio for="female">女性</label>
        @endisset
      </td>
    </tr>

    <tr>
      <th class=email>
        <label for="">メールアドレス<span>&nbsp;※</span></label>
        @error('email')
        <div class=error_message> {{$message}}</div>
        @enderror
      </th>
      <td>
        <div class=form_flex>
          <div class=form_box>
          <input type="email" name="email" value="@isset($inputs){{$inputs['email']}} @else{{old('email')}}  @endisset">
          <p>&emsp;例）test@example.com</p>
        </div>
      </div>
      </td>
    </tr> 

    <tr>
    <th class=postcode>
      <label for="">郵便番号<span>&nbsp;※</span></label>
      @error('postcode')
      <div class=error_message> {{$message}}</div>
      @enderror
    </th>
      <td>
        <div class=form_flex>
          <div class = zipmark>〒&emsp;</div>  
            <div class=form_box>
              <input type="text" name="postcode" value="@isset($inputs){{$inputs['postcode']}} @else{{old('postcode')}}  @endisset"  onKeyUp="AjaxZip3.zip2addr(this,'','address','address')">
              <p>&emsp;例）123-4567</p>
          </div>
        </div>
      </td>
    </tr>

    <tr>
      <th class=address>
        <label for="">住所<span>&nbsp;※</span></label>
        @error('address')
        <div class=error_message> {{$message}}</div>
        @enderror
      </th>
      <td>
        <div class=form_flex>
          <div class=form_box>
            <input type="text" name="address" value="@isset($inputs){{$inputs['address']}} @else{{old('address')}}  @endisset">
            <p>&emsp;例）東京都渋谷区千駄ヶ谷1-2-3</p>
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
            <input type="text" name="building_name" value="@isset($inputs){{$inputs['building_name']}} @else{{old('building_name')}}  @endisset">
            <p>&emsp;例）千駄ヶ谷マンション101</p>
          </div>
        </div>
      </td>
    </tr>
    
    <tr>
      <th class=opinion>
        <label for="">ご意見<span>&nbsp;※</span></label>
        @error('opinion')
        <div class=error_message> {{$message}}</div>
        @enderror
      </th>
      <td>
        <div class=form_flex>
          <div class=form_box>
            <textarea name="opinion" id="" cols="30" rows="4" maxlength="120">@isset($inputs) {{$inputs['opinion']}} @else {{old('opinion')}} @endisset</textarea>
        </div>
      </div>
      </td>
    </tr>
  </table>
  <div class=button_box>
  <button type="submit">確認</button>
  </div>
</form>

@endsection