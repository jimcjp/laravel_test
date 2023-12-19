<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
// use App\Models\Blog;
// use App\Models\User;

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    // 個人信息頁面
    public function infoPage()
    {
        return view('user.info');
    }

    // 個人信息更新
    public function infoUpdate(UserRequest $request)
    {

        // $validated = $request->validate([
        //     'name' => 'required|min:4|max:32',
        //     'email' => 'required|email',
        // ]);

        $name = $request -> input('name');
        $email = $request -> input('email');



        //獲取用戶ID
        // $uid = auth() -> user() ->id ;
            $uid = auth() -> id();

        
        // 更新用戶數據
        $res = DB::table('users')
            -> where('id',$uid)
            -> update(['name' => $name, 'email' => $email]);

        if($res) {
            return back()->with(['success' => '更新成功']);
        } else {
            return back()->with(['warning' => '未做更改']);;
        }  


        //使用模型更新-僅做了解
        // $users = auth() -> user();
        // $users -> name = $name;  
        // $users -> email = $email;
        // $users -> save();
    }


    // 頭像頁面
    public function avatarPage()
    {
        return view('user.avatar');
    }

    //頭像 執行修改
    public function avatarUpdate(Request $request)
    {

        //快速驗證
        $validated = $request->validate([
            'avatar' => 'required|image',
        ], [
            'avatar.required' => '請選擇圖片',
            'avatar.image' => '圖片只支援（jpg，jpeg，png，bmp，gif，svg，或 webp）',
        ]);



        //獲得上傳文件
        $file = $request -> file('avatar');


        //保存到storage/app 目錄
        // $path = $file -> store('avatar');

        // 自定義文件名
        // $path = $file -> storeAs('avatar','a.png');

        //指定存在public資料夾
        $path = $file -> store('avatar', 'public');

        //更新之前獲取用戶原有頭像
        $oldAvatar = auth() -> user() -> avatar;


        //更新登陸用戶頭像  
        $uid = auth() ->id();
        $res = DB::table('users')
            -> where('id',$uid)
            -> update(['avatar' => $path]);

        if($res) {
            //用戶頭像更新之後,刪除原有頭像
            Storage::disk('public') -> delete($oldAvatar);

            return back()->with(['success' => '更新成功']);
        } else {
            return back()->withErrors(['未做更改']);;
        }  
    }
 

    //所有部落格
    public function blog()
    {

        $blogs = auth()
            ->user()
            ->blogs()
            ->withCount('comments')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        return view('user.blog',['blogs' => $blogs]);
    }
    
}
