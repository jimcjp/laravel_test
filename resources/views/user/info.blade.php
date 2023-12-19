@extends('layout.app')

@section('title', "修改個人訊息")

@section('style')
    <style>

    </style>

@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3">
                @include('common.user-menu', ['nav' => 'info'])
            </div>
            <div class="col-sm-9 p-0">
                <div class="card">
                    <div class="card-header bg-white fs-14">
                        修改個人訊息
                    </div>
                    <div class="card-body">
                        @include('common.success')
                        @include('common.warning')

                        <form method="post" class="col-md-6 offset-3">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="exampleInputName" class="fs-14"
                                font-weight-bold>用戶名</label>
                                <input name="name" type="text" value="{{ auth()->user()->name }}" placeholder="
                                請填寫用戶名" class="@error('name') is-invalid @enderror form-control form-control-sm" id="
                                exampleInputName" aria-describedby="emailHelp">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail" class="fs-14"
                                font-weight-bold>電子信箱</label>
                                <input name="email" type="email" value="{{ auth()->user()->email }}" placeholder="
                                請填寫電子信箱" class="@error('email') is-invalid @enderror form-control form-control-sm" id="
                                exampleInputEmail" aria-describedby="emailHelp">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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