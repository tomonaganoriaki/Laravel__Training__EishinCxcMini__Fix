<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // 外部キー制約の削除
            $table->dropForeign('products_shop_id_foreign');
            // カラムの削除
            $table->dropColumn('shop_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // カラム追加
            $table->bigInteger('shop_id')->unsigned();
            // カラムの外部キー制約追加
            $table->foreign('shop_id')->references('shop_id')->on('shops')->OnDelete('cascade');
        });
    }
};
