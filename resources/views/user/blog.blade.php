@extends('layout.app')

@section('title', "所有部落格")

@section('style')
    <style>
        .blog-list:last-child {
            border-bottom: none !important;
        }
    </style>

@endsection


@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3">
                @include('common.user-menu', ['nav' => 'blog'])
            </div>
            <div class="col-sm-9 p-0">
                <div class="card">
                    <div class="card-header bg-white fs-14">
                        所有部落格
                    </div>
                    <div class="card-body">
                        @foreach ( $blogs as $blog )
                        <div class="blog-list border-bottom pb-3 mb-3 blog-item">
                            <div><a href="{{ route('blog.show', $blog) }}" class="text-dark text-decoration-none" >{{ $blog->title }}</a></div>
                            <div class="mt-2 d-flex justify-content-between">
                                <div class="fs-14 text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                    </svg>
                                    {{-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
                                       <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
                                    </svg> --}}
                                    <span class="mr-2">{{ $blog->updated_at->diffForHumans() }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>                                    
                                    {{-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="??????????">
                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8"></path>
                                        <path fill-rule="evenodd" d="M8 5.5a2 2.5 0 1 0 0"></path>
                                     </svg> --}}
                                     <span class="mr-2">{{ $blog->view }}</span>
                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-text" viewBox="0 0 16 16">
                                        <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                                        <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                     </svg>
                                     {{-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="??????????">
                                        <path fill-rule="evenodd" d="M2.678 11.894a1 1 0 0 1"></path>
                                        <path  d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0"></path>
                                     </svg> --}}
                                     <span></span>{{ $blog->comments_count }}
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="custom-control custom-switch mr-3">
                                        <input {{ $blog->status == 1 ? 'checked' : '' }} data-url="{{ route('blog.status', $blog) }}" type="checkbox" class="status-blog custom-control-input" id="status-{{ $blog->id }}">
                                        <label class="custom-control-label text-muted" style="font-size:14px" for="status-{{ $blog->id }}">是否發佈</label>
                                    </div>
                                    <a href="{{ route('blog.edit', $blog) }}" class="btn btn-sm py-0 px-3 btn-primary ">編輯</a>
                                    <a href="javascript:;" data-url="{{ route('blog.destroy', $blog) }}" class="del-blog btn btn-sm py-0 px-3 btn-danger ml-2 ">刪除</a>
                                </div>
                            </div>                                
                        </div>                           
                        @endforeach

                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            
            // 刪除部落格
            $('.del-blog').click(function () {
                var that = this;
                $.ajax({
                    url: $(this).data('url'),
                    type:'delete',
                    dataType:'json',
                    success: function (res) {
                        if (res.code == 200) {
                            //刪除部落格 及時從頁面消失
                            $(that).parents('.blog-item').remove()
                            notify('success', res.msg)      
                        } else {
                            notify('error', res.msg)
                        }
                    }
                })
            })

            // 改變部落格
            $('.status-blog').change(function () {
                $.ajax({
                    url: $(this).data('url'),
                    type:'patch',
                    dataType:'json',
                    success: function (ggg) {
                        if (ggg.code == 200) {                            
                            notify('success', ggg.msg)      
                        } else {
                            notify('error', ggg.msg)
                        }
                    }
                })
            });
        })
        
    </script>
@endsection