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
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ma_sv')->unique();
            $table->string('ho_ten');
            $table->integer('tuoi');
            $table->string('email')->unique();
            $table->string('lop');
            $table->decimal('diem_tb', 3, 2);
            $table->string('trang_thai')->default('Đang học');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinh_viens');
    }
};
