@extends('layout.app')

@section('title', "修改頭像")

@section('style')
    <style>

    </style>

@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3">
                @include('common.user-menu', ['nav' => 'avatar'])
            </div>
            <div class="col-sm-9 p-0">
                <div class="card">
                    <div class="card-header bg-white fs-14">
                        修改頭像
                    </div>
                    <div class="card-body">
                        @include('common.success')
                        @include('common.error')
                        <form method="post" action="{{ route('user.avatar.update') }}" class="col-md-6 offset-3" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlFile1">請選擇頭像上傳</label>
                                <input name="avatar" type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm w-100 
                            mt-4 bg-blue text-white">修改</button>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    @endsection

@section('script')
    <script>

        
    </script>
@endsection