@extends('layouts.default')

@section('title', '画像アップロード')
@section('content')
    {{-- session に success があれば、その中身を表示する --}}
    @if(session()->has('success'))
        <p>{{ session()->get('success') }}</p>
    @endif

    <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>画像： <input type="file" name="image"></label>
        <button type="submit">アップロード</button>
    </form>
@endsection
