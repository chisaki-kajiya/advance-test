@extends('layouts.default')

@section('title', '内容確認')

@section('content')
<h1 class="title">内容確認</h1>
<form action="/thanks" method="post">
  @csrf
  <table class="contact-table">
    <tr>
      <th class="contact-table__left">
        お名前
      </th>
      <td class="contact-table__right">
        {{ $last_name }}　{{ $first_name }}
        <input type="hidden" name="fullname" value="{{ $last_name.$first_name }}">
      </td>
    </tr>
    <tr>
      <th class="contact-table__left">
        性別
      </th>
      <td class="contact-table__right">
        {{ $gender }}
        <input type="hidden" name="gender" value="{{ $gender }}">
      </td>
    </tr>
    <tr>
      <th class="contact-table__left">
        メールアドレス
      </th>
      <td class="contact-table__right">
        {{ $email }}
        <input type="hidden" name="email" value="{{ $email }}">
      </td>
    </tr>
    <tr>
      <th class="contact-table__left">
        郵便番号
      <td class="contact-table__right">
        {{ $postcode }}
        <input type="hidden" name="postcode" value="{{ $postcode }}">
      </td>
    </tr>
    <tr>
      <th class="contact-table__left">
        住所
      </th>
      <td class="contact-table__right">
        {{ $address }}
        <input type="hidden" name="address" value="{{ $address }}">
      </td>
    </tr>
    <tr>
      <th class="contact-table__left">
        建物名
      </th>
      <td class="contact-table__right">
        {{ $building_name }}
        <input type="hidden" name="building_name" value="{{ $building_name }}">
      </td>
    </tr>
    <tr>
      <th class="contact-table__left">
        ご意見
      </th>
      <td class="contact-table__right">
        {{ $opinion }}
        <input type="hidden" name="opinion" value="{{ $opinion }}">
      </td>
    </tr>
  </table>
  <button class="black-button">送信</button>
</form>
<form action="/back" method="post">
@csrf
  <input type="hidden" name="last_name" value="{{ $last_name }}">
  <input type="hidden" name="first_name" value="{{ $first_name }}">
  <input type="hidden" name="gender" value="{{ $gender }}">
  <input type="hidden" name="email" value="{{ $email }}">
  <input type="hidden" name="postcode" value="{{ $postcode }}">
  <input type="hidden" name="address" value="{{ $address }}">
  <input type="hidden" name="building_name" value="{{ $building_name }}">
  <input type="hidden" name="opinion" value="{{ $opinion }}">
  <button class="black-underline">修正する</button>
</form>
@endsection