<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();  // Tạo trường id tự động tăng
        $table->string('name');  // Tên loại sách
        $table->timestamps();
    });
}

    public function down()
{
    Schema::dropIfExists('categories');
}

};
