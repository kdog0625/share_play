<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->integer('admin_users_id')->nullable(false)->comment('シェアハウス登録者ID');
            $table->string('shara_name', 50)->nullable(false)->comment('シェアハウスの名前');
            $table->string('prefecture_name', 20)->nullable(false)->comment('都道府県');
            $table->string('municipality_name', 20)->nullable(false)->comment('市区町村');
            $table->string('supplementary_address', 50)->nullable(false)->comment('補足住所');
            $table->string('share_picture', 20)->nullable(false)->comment('シェアハウス画像');
            $table->string('share_text')->nullable(false)->comment('シェアハウス説明');
            $table->smallInteger('exchange_about')->nullable(false)->comment('公開ステータス(1:日本人との交流が多い /2:外国人との交流が多い /3:挨拶程度の交流 /4:ほとんど交流なし)');
            $table->integer('build_age')->nullable(false)->comment('築年数');
            $table->smallInteger('private_room')->nullable(false)->comment('個室')->nullable(false)->comment('公開ステータス(1: 4畳 /2 :4.5畳 /3: 5畳 /4: 5.5畳 /5: 6畳 /6: 6.5畳 /7: 7畳 /8: 7.5畳 /9: 8畳 /10: 8.5畳 /11: 9畳 /12: 9.5畳 /13: 10畳 /14: 10.5畳 /15: 11畳 /16: 11.5畳 /17: 12畳 /18: 12.5畳 /19: 13畳以上 /20: 個室なし)');
            $table->smallInteger('dormitory_room')->nullable(false)->comment('ドミトリールーム')->nullable(false)->comment('公開ステータス(1: 4畳 /2 :4.5畳 /3: 5畳 /4: 5.5畳 /5: 6畳 /6: 6.5畳 /7: 7畳 /8: 7.5畳 /9: 8畳 /10: 8.5畳 /11: 9畳 /12: 9.5畳 /13: 10畳 /14: 10.5畳 /15: 11畳 /16: 11.5畳 /17: 12畳 /18: 12.5畳 /19: 13畳以上 /20: ドミトリーなし)');
            $table->string('access_about', 255)->nullable(false)->comment('アクセスについて');
            $table->string('friends_exchange')->nullable(false)->comment('友人の宿泊の有無')->nullable(false)->comment('公開ステータス(1:あり /2:なし /3:条件付きであり)');
            $table->string('friend_desc', 255)->nullable()->comment('友人の宿泊に対する条件');
            $table->string('gender_ratio', 20)->nullable(false)->comment('男女比率');
            $table->string('jp_ov_ratio', 20)->nullable(false)->comment('日本人と外国人の比率');
            $table->string('age_ratio', 20)->nullable(false)->comment('年齢層の比率');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shares');
    }
}
