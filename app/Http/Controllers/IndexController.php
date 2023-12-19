<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //blog首頁
    public function index(Request $request)
    {
        // 搜尋關鍵字
        // 寫法一
        // $keyword = $request->input('keyword');
        // 寫法二
        $keyword = $request->query('keyword');
        
        //獲取分類id
        $category_id = $request->query('category_id');

        // 查詢部落格數據
        $res = Blog::when($keyword, function($query) use($keyword) {
            $query->where(function($query) use($keyword){
                $query->where('title', 'like', "%{$keyword}%")
                      ->orwhere('content', 'like', "%{$keyword}%");
            });
                
        })
        ->when($category_id, function($query) use($category_id) {
                        $query->where('category_id', $category_id);
        })
        ->with('user:id,name')
        ->where('status', 1)
        ->orderBy('updated_at', 'desc')
        ->paginate(6);
        return view('index.index', ['blogs' => $res]);
    }
}
