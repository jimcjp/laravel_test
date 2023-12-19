<?php
namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlogComment;
use App\Jobs\CommentEmail;

class CommentController extends Controller
{
    /**
     * 評論部落格
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Blog $blog)
    {
        $comment = $blog->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->input('content')
        ]);        


        if ($comment) {
            $retData = [
                'avatar_url' => avatar(auth()->user()->avatar),
                'user_name' => auth()->user()->name,
                'content' => $request->input('content'),
            ];

            //發送信件通知作者有新的回覆   to()裡面可以傳用戶模型/模型集合/信箱地址
            // Mail::to($blog->user)->send(new BlogComment($comment));

            // 使用隊列發送信件 自定義隊列
            // CommentEmail::dispatch($comment);

            // 使用信件隊列發送
            Mail::to($blog->user)->queue(new BlogComment($comment));

            return response()->api('回覆成功', 200, $retData);
        } else {
            return response()->api('回覆失敗', 400);
        }
    }
}
