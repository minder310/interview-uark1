<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apply_file', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('使用者編號');
            // 宣告user_id為外來鍵，參照users資料表的id欄位。
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('file_path')->comment('檔案路徑');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
