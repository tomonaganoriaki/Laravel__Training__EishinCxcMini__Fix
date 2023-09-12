<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()  // マイグレーション実行時に呼び出される関数.
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');  // 主キー
            $table->timestamps();      // created_at と updated_at カラムの作成.
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // ロールバック時に呼び出される関数.
    {
        Schema::dropIfExists('features');
    }
};
