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
    Schema::create('books', function (Blueprint $table) {
        $table->id();  // Tạo trường id tự động tăng
        $table->string('title');  // Tiêu đề sách
        $table->string('thumbnail');  // Link ảnh mô tả
        $table->string('author');  // Tác giả
        $table->string('publisher');  // Nhà xuất bản
        $table->date('publication');  // Ngày xuất bản
        $table->double('price');  // Giá bán
        $table->integer('quantity');  // Số lượng
        $table->unsignedBigInteger('category_id');  // Mã loại, khóa ngoại
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('books');
}

};
