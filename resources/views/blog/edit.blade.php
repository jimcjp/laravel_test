@extends('layout.app')

@section('title', "編輯部落格")

@section('style')
    <style>

    </style>

@endsection

@section('content')
    <div class="container">
        <div class="card mb-3 mt-4">
            <div class="card-body">
                @include('common.error')
                @include('common.success')
                    {{-- 寫法1
                <form method="POST" action="{{ route('blog.update', ['blog' => $blog->id]) }}">
                    寫法2
                <form method="POST" action="{{ route('blog.update', ['blog' => $blog]) }}">
                    寫法3
                <form method="POST" action="{{ route('blog.update', $blog->id) }}">
                    寫法4 --}}
                <form method="POST" action="{{ route('blog.update', $blog) }}">    
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">標題</label>
                        <input name="title" type="text" class="form-control" value="{{ $blog->title }}" id="
                        exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">分類</label>
                        <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                            <option>請選擇分類</option>
                            @foreach (categories() as $id => $name)
                                <option {{ $blog->category_id == $id ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">內容</label>
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" cols="30" rows="10">{{ $blog->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-25 offset-4">發佈</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
        
@endsection