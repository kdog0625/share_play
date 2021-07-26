<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shares', function (Blueprint $table) {
            $table->bigInteger('admin_users_id')->nullable(false)->unsigned()->comment('シェアハウス登録者ID');
            //外部キー制約
            $table->foreign('admin_users_id')
                ->references('id')
                ->on('admin_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shares', function (Blueprint $table) {
            //
        });
    }
}
