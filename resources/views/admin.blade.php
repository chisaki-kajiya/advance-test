@extends('layouts.default')

@section('title', '管理システム')

@section('content')
<h1 class="title">管理システム</h1>
<div class="search-form">
  <form action="/search" method="get">
    <table>
      <tr>
        <th class="search-form__left">
          お名前
        </th>
        <td class="flex">
          <input type="text" class="gray-border ml30" name="fullname">
          <h3 class="align-center ml30">性別</h3>
          <label class="align-center ml30">
            <input type="radio" name="gender" value="" class="input" checked>
            <span class="input-design--checked"></span>
            <span class="input-design--frame"></span>
            <span class="input-value">全て</span>
          </label>
          <label class="align-center">
            <input type="radio" name="gender" value="男性" class="input">
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
      <tr>
        <th class="search-form__left">
          登録日
        </th>
        <td>
          <input type="date" class="gray-border ml30 input-date" name="created_from">
          <span class="search-form__created-at--wavy-line">~</span>
          <input type="date" class="gray-border input-date" name="created_to">
        </td>
      </tr>
      <tr>
        <th class="search-form__left">
          メールアドレス
        </th>
        <td>
          <input type="text" class="gray-border ml30" name="email">
        </td>
      </tr>
    </table>
    <button class="black-button">検索</button>
    <input class="black-underline" value="リセット" type="reset">
  </form>

</div>
<div class="contacts-list__container">
  <div class="contacts-list__top">
    <p>全{{ $contacts->total() }}件中　{{ $contacts->firstItem() }}件〜{{ $contacts->lastItem() }}件を表示</p>
    {{ $contacts->links('pagination::default') }}
  </div>
  <table class="contacts-list__table">
    <tr class="contacts-list__table-head">
      <th class="contacts-list__table-head-item">ID</th>
      <th class="contacts-list__table-head-item">お名前</th>
      <th class="contacts-list__table-head-item">性別</th>
      <th class="contacts-list__table-head-item">メールアドレス</th>
      <th class="contacts-list__table-head-item">ご意見</th>
    </tr>
    @foreach ($contacts as $contact)
    <tr>
      <td class="pl30">
        {{ $contact->id }}
      </td>
      <td class="pl30">
        {{ $contact->fullname }}
      </td>
      <td class="pl30">
        @if($contact->gender === 1)
        男性
        @else
        女性
        @endif
      </td>
      <td class="pl30">
        {{ $contact->email }}
      </td>
      <td class="pl30 contacts-list__table-data--opinion">
        <p class="hover-invisible">{{ Str::limit($contact->opinion,75,'…')}}</p>
        <p class="hover-visible">{{ $contact->opinion }}</p>
      </td>
      <td class="align-right pl30">
        <form action="/delete/{{$contact->id}}" method="post">
          @csrf
          <button class="contacts-list__table-delete-button">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection