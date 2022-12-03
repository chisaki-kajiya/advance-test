@extends('layouts.default')

@section('title', 'お問い合わせ')

@section('content')
<h1 class="title">お問い合わせ</h1>
<form method="post" action="/confirm">
  @csrf
  <table class="contact-table">
    <tr>
      <th class="contact-table__left">
        お名前<span class="red">※</span>
      </th>
      <td class="contact-table__right">
        <div class="width100">
          <div class="spacebtw">
            <div class="contact-table__right--name">
              @if ($errors->has('last_name'))
              <p class="error">{{$errors->first('last_name')}}</p>
              @endif
              <input type="text" class="gray-border width100" name="last_name" value="{{ $last_name }}">
              <p class="example">例）山田</p>
            </div>
            <div class="contact-table__right--name">
              @if ($errors->has('first_name'))
              <p class="error">{{$errors->first('first_name')}}</p>
              @endif
              <input type="text" class="gray-border width100" name="first_name" value="{{ $first_name }}">
              <p class="example">例）太郎</p>
            </div>
          </div>
        </div>
      </td>
    </tr>
    @if ($errors->has('gender'))
    <tr>
      <th></th>
      <td class="error">{{$errors->first('gender')}}</td>
    </tr>
    @endif
    <tr>
      <th class="contact-table__left">
        性別<span class="red">※</span>
      </th>
      <td class="contact-table__right flex">
        <label class="align-center">
          <input type="radio" name="gender" value="男性" class="input" checked>
          <span class="input-design--checked"></span>
          <span class="input-design--frame"></span>
          <span class="input-value">男性</span>
        </label>
        <label class="align-center">
          <input type="radio" name="gender" value="女性" class="input">
          <span class="input-design--checked"></span>
          <span class="input-design--frame"></span>
          <span class="input-value">女性</span>
        </label>
      </td>
    </tr>
    @if ($errors->has('email'))
    <tr>
      <th></th>
      <td class="error">{{$errors->first('email')}}</td>
    </tr>
    @endif
    <tr>
      <th class="contact-table__left">
        メールアドレス<span class="red">※</span>
      </th>
      <td class="contact-table__right">
        <input type="email" class="width100 gray-border" name="email" value="{{ $email }}">
        <p class="example">例）test@example.com</p>
      </td>
    </tr>
    @if ($errors->has('postcode'))
    <tr>
      <th></th>
      <td class="error">{{$errors->first('postcode')}}</td>
    </tr>
    @endif
    <tr>
      <th class="contact-table__left">
        郵便番号<span class="red">※</span>
      </th>
      <td class="contact-table__right">
        <div class="width100">
          <div class="spacebtw">
            <label for="postcode">〒</label>
            <input type="text" onblur="toHalfWidth(this)" onKeyUp="$('#郵便番号').zip2addr('#住所');" class="gray-border width90" name="postcode"
            value="{{ $postcode }}"
            id="郵便番号">
          </div>
        </div>
        <p class="example">例）123-4567</p>
      </td>
    </tr>
    @if ($errors->has('address'))
    <tr>
      <th></th>
      <td class="error">{{$errors->first('address')}}</td>
    </tr>
    @endif
    <tr>
      <th class="contact-table__left">
        住所<span class="red">※</span>
      </th>
      <td class="contact-table__right">
        <input type="text" class="width100 gray-border" name="address" value="{{ $address }}" id="住所">
        <p class="example">例）東京都渋谷区千駄ヶ谷1-2-3</p>
      </td>
    </tr>
    <tr class="contact-table__item">
      <th class="contact-table__left">
        建物名
      </th>
      <td class="contact-table__right">
        <input type="text" class="width100 gray-border" name="building_name" value="{{ $building_name }}">
        <p class="example">例）千駄ヶ谷マンション101</p>
      </td>
    </tr>
    @if ($errors->has('opinion'))
    <tr>
      <th></th>
      <td class="error">{{$errors->first('opinion')}}</td>
    </tr>
    @endif
    <tr>
      <th class="contact-table__left">
        ご意見<span class="red">※</span>
      </th>
      <td class="contact-table__right">
        <textarea class="width100 gray-border resize-none" name="opinion">{{ $opinion }}</textarea>
      </td>
    </tr>
  </table>
  <button class="black-button">確認</button>
</form>
@endsection