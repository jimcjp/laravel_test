<?php



if (! function_exists('categories')) 
{
    function categories() 
    {       
        //查詢cache緩存有就使用 沒有就去資料庫查詢並存在緩存裡面不刪除
        $categories = cache()->rememberForever('categories', function () {
            return DB::table('categories')->pluck('name', 'id');
        });
        
        return $categories;
    }

}


// 返回頭像地址

if (! function_exists('avatar')) 
{
    function avatar($avatar) 
    {       
        $avatar_url = $avatar ? asset('storage/' . $avatar) : asset('img/default/emoji-smile.svg');
        return $avatar_url;
    }

}