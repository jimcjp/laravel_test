<?php

namespace App\Http\Controllers;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }


    // 添加blog頁面
    public function create()
    {
        return view('blog.create');
    }

    // 執行blog的添加
    public function store(BlogRequest $request)
    {
        // 方式1
        // dd(array_merge($request->except(['_token']),['user_id' => auth()->user()->id]));
       
        $request ->offsetSet('user_id', auth()->user()->id);
        $res = Blog::create($request->except(['_token']));

        if($res){
            return back()->with(['success' => '發佈成功']);
        } else {
            return back()->withErrors('發佈失敗')->withInput();
        }
    }

    // 查看一條blog詳情
    public function show($id)
    {        
        $blog = Blog::with('comments')->where('id',$id)->first();
        $blog->timestamps = false;
        $blog->increment('view');
        $blog->timestamps = true;
       return view('blog.show', ['blog' => $blog]);
    }

    // 編輯blog頁面
    public function edit(Blog $blog)
    {
        // dd($blog);
        return view('blog.edit', ['blog' => $blog]);
    }

    // 更新blog頁面
    public function update(BlogRequest $request, Blog $blog)
    {
        //方式一
        // $blog->title = $request->input('title');
        // $blog->content = $request->input('content');
        // $blog->category_id = $request->input('category_id');
        // $blog->save();
        
        //方式二
        $blog->fill($request->except(['_token','_method']));
        $blog->save();
     

        if($blog) {
            return back()->with(['success' => '更新成功']);
        } else {
            return back()->withErrors(['更新失敗']);;
        }  
    }

    // 刪除blog頁面
    public function destroy(Blog $blog)
    {
        // 使用事務刪除文章
        // DB::beginTransaction();

        // try {
        //     // 刪除文章 
        //     $blog->delete();

        //     // 刪除文章相關回覆
        //     $blog->comments()->delete();

        //     // 提交事務
        //     DB::commit();

        //     return response()->api(['刪除成功']);
        // } catch (\Exception $e) {
        //     // 回滾事務
        //     DB::rollBack();
        //     return response()->api(['刪除失敗', 400]);
        // } 


        // 使用模型事件刪除文章,自動刪除回覆
        $res = $blog->delete();

        if ($res) {                        
              return response()->api(['刪除成功']);              
        }   else {
              return response()->api(['刪除失敗', 400]);
        }                    
    }

    // 修改部落格狀態
    public function status(Blog $blog)
    {
        $blog->timestamps = false;
        $blog->status = $blog->status == 1 ? 0 : 1;              
        $res = $blog->save();

        if($res) {
            $msg = $blog->status == 1 ? '已發佈成功' : '已取消發佈' ;
            return response()->api($msg);
        } else {
            return response()->api(['刪除失敗', 400]);;
        }  
    }

}
