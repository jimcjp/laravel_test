@extends('layout.app')

@section('title', '部落格詳情')

@section('style')
<link rel="stylesheet" href="{{ asset('css/markdown.css') }}">
<style>
    .replay:last-child {
        border-bottom: none !important;
    }
</style>

@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    @if(auth()->id() == $blog->user_id)
                    <div class="text-right"><a href="{{ route('blog.edit', $blog) }}" class="btn btn-primary btn-sm" >編輯</a></div>
                    @endif
                    <h3 class="font-weight-light text-center mb-3">{{ $blog->title}}</h3>
                    <div class="text-center fs-14 text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                            <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                        </svg>
                        {{-- <svg width="1em" height="1em" viewbox="0 0 16 16" ?????????>
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 la7 7 0 0 0 0 14zm8-7A8 8 0 1 1?????">
                                <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0????">
                        </svg> --}}
                        <span class="mr-2">{{ $blog->updated_at->diffForHumans()}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>  
                        {{-- <svg width="1em" height="1em" viewbox="0 0 16 16" ?????????>
                            <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16?????">
                                <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5????">
                        </svg> --}}
                        <span class="mr-2">{{ $blog->view}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                            <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                         </svg>
                        {{-- <svg width="1em" height="1em" viewbox="0 0 16 16" ?????????>
                            <path fill-rule="evenodd" d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 0 0 1 ?????">
                            <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4????">
                        </svg> --}}
                        <span></span>2
                    </div>
                    <hr>
                    <div class="markdown" id="content">
                        
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header bg-white fs-14">
                    回覆數量
                </div>
                <div class="card-body" id="comment-list">
                    {{-- 存在就循環 不存在就跳過 --}}
                    @forelse($blog->comments as $comment)
                    <div class="media mb-3 border-bottom pb-3 replay">
                        <img width="50" height="50" src="{{ avatar($comment->user->avatar) }}" class="mr-3 rounded-pill" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $comment->user->name }}</h5>
                            {{ $comment->content }}
                        </div>
                    </div>
                    @empty
                        <div id="empty" class="text-center py-3 text-muted">暫無回復....</div>
                    @endforelse                                             
                </div>
            </div>


            @auth
                <div class="card mt-4">
                    <div class="card-body pb-2">
                        <form id="form-comment" method="post" action="{{ route('blog.comment', $blog) }}" >
                            @csrf
                            <div class="form-group">
                                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="text-right">
                                <button id="btn-comment" type="button" class="btn btn-primary btn-sm px-5">回覆</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="card mt-4">
                    <div class="card-body pb-2">
                        <div class="alert alert-warning" role="alert">
                            你還沒有登入!     
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm py-1 px-4 ml-3">馬上登入</a>
                        </div>
                    </div>
                </div>
            @endauth

        </div>
        <div class="col-sm-3 p-0">
            @include('common.right-card', [
                'imgUrl' => '..\img\right-card.png',
                'title' => $blog->category->name,
                'content' => '收錄了' . $blog->category->name . '相關的文章',
                'count' => $blog->category->blogs()->count(),
                'category_id' => $blog->category_id,
            ])
        </div>
    </div>    
</div>

@endsection
@section('script')
    <script src="{{ asset('js/showdown.min.js') }}"></script>
    <script src="{{ asset('js/showdown-table.min.js') }}"></script>
    
    <script>
        function convert(){
            var text = @json($blog->content);
            var converter = new showdown.Converter({extensions: ['table'] });
            var html = converter.makeHtml(text);
            $('#content').html(html)
            $('#content > table').addClass('table table-bordered');
        }
        convert();   



        $(function () {
            // 點擊發送回復
            $('#btn-comment').click(function () {
                var form = $('#form-comment');
                // 提交回復                
                $.ajax
                ({
                    url: form.attr('action'),
                    type:'POST',
                    data: form.serialize(),
                    dataType: 'json',
                    success: function (res)
                    {
                        if (res.code == 200)
                        {
                            // 回復成功後 即時顯示在網頁上
                            $('#comment-list').append(`
                            <div class="media mb-3 border-bottom pb-3 replay">
                                    <img width="50" height="50" src="${ res.data.avatar_url }" class="mr-3 rounded-pill" alt="...">
                                    <div class="media-body">
                                        <h5 class="mt-0">${ res.data.user_name }</h5>
                                        ${ res.data.content }
                                    </div>
                            </div>
                        `);
                            // 清空輸入框內容
                            $('textarea[name="content"]').val('')
                            // 暫無回覆字隱藏
                            $('#empty').hide()
                            notify('success',res.msg)
                        } else {
                            notify('error',res.msg)
                        }
                    }
                })
            })
        })

    </script>
@endsection




