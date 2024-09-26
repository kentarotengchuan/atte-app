@extends('auth.layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset("css/verify.css")}}">
@endsection
@section('content')
<main>
    <div class="content">
        <p class="message">入力したメールアドレスを認証してください</p>
        <form action="/email/verification-notification" method="post">
        @csrf
            <button type="submit" class="button__sent">確認メールの再送信</button>
        </form>
        @if (session('status') == 'verification-link-sent')
        <div class="message__sent">
            確認メールが送信されました
        </div>
        @endif
    </div>
</main>
@endsection