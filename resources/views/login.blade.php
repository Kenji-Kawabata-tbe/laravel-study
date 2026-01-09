@extends('layouts.default')

@section('title', 'ログイン')
@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf <!-- GETメソッド以外で送信する場合、csrfトークンが無いと419エラーになる -->
        <div><label>メールアドレス: <input type="email" name="email"></label></div>
        <div><label>パスワード: <input type="password" name="password"></label></div>
        <button type="submit">ログイン</button>
    </form>
@endsection
