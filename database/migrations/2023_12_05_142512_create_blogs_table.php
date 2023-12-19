<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('用戶id');
            $table->integer('category_id')->comment('分類id');
            $table->string('title')->comment('部落格標題');
            $table->text('content')->comment('部落格內容');
            $table->tinyInteger('status')->default(1)->comment('部落格狀態:0未發布 1發布');            
            $table->timestamps();
        });


        Schema::table('blogs', function (Blueprint $table) {
            $table->integer('view')->default(0)->comment('瀏覽量');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
