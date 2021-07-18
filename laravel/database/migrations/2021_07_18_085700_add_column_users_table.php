<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->String('share_user_id', 20)->nullable(false)->comment('自身で決めたユーザーID');
            $table->String('name_kanji1',25)->nullable(false)->comment('氏名(性)');
            $table->String('name_kanji2',25)->nullable(false)->comment('氏名(名)');
            $table->String('name_kana1',25)->nullable(false)->comment('フリガナ(セイ)');
            $table->String('name_kana2',25)->nullable()->comment('フリガナ(メイ)');
            $table->String('birth_day',8)->nullable(false)->comment('氏名(性)');
            $table->integer('age')->nullable(false)->comment('年齢');
            $table->String('sex')->nullable(false)->comment('性別 (1:男性 /2:女性)');
            $table->String('area_country')->nullable(false)->comment('在住地域 (1:日本 /2:アメリカ /3:韓国 /4:台湾)');
            $table->String('prefecture_name')->nullable()->comment('都道府県');
            $table->String('tel',12)->nullable(false)->comment('電話番号');
            $table->String('profile_image',255)->nullable()->comment('プロフェール画像');
            $table->String('profile_text',255)->nullable()->comment('プロフィール紹介');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('share_user_id');
            $table->dropColumn('name_kanji1');
            $table->dropColumn('name_kanji2');
            $table->dropColumn('name_kana1');
            $table->dropColumn('name_kana2');
            $table->dropColumn('birth_day');
            $table->dropColumn('age');
            $table->dropColumn('sex');
            $table->dropColumn('area_country');
            $table->dropColumn('prefecture_name');
            $table->dropColumn('tel');
            $table->dropColumn('profile_image');
            $table->dropColumn('profile_text');
        });
    }
}
