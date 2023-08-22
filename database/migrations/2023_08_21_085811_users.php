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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('org_id')->comment('組織編號');
            // 宣告org_id為外來鍵，參照orgs資料表的id欄位。
            $table->foreign('org_id')->references('id')->on('orgs');
            $table->string('name')->comment('姓名');
            $table->date('birthday')->comment('生日');
            $table->string('email')->comment('電子郵件');
            $table->unsignedBigInteger('account')->nullable()->comment('帳號');
            $table->string('password')->comment('密碼');
            $table->boolean('status')->default(1)->comment('狀態');
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
