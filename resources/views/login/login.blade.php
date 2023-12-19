@extends('layout.app')

@section('title', '登入')

@section('style')
    <style>
        
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row pt-4">
            <div class="card col-lg-4 offset-4 mb-3 mt-5">
                <div class="card-body">

                    @include('login.nav-top', ['nav' => 'login'])

                    <hr>

                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1"  class="fs-14 font-weight-bold">用戶 or email</label>
                            <input type="email" class="form-control form-control-sm"
                                    id="exampleInputEmail1"
                                    placeholder="請填寫用戶名或Email"
                                    aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="fs-14 font-weight-bold">密碼</label>
                            <input type="password" placeholder="請輸入密碼" class="form-control form-control-sm">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm w-100 mt-4 ????">登入</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
        <script>

        </script>
    
    @endsection