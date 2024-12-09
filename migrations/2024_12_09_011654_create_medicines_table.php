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
        
        Schema::create('medicines', function (Blueprint $table) {
            $table->string('medicine_id')->primary(); // Mã thuốc, BIGINT UNSIGNED
            $table->string('name', 255); // Tên thuốc
            $table->string('brand', 100)->nullable(); // Thương hiệu
            $table->string('dosage', 50)->nullable(); // Liều lượng
            $table->string('form', 50)->nullable(); // Dạng thuốc
            $table->decimal('price', 10, 2); // Giá
            $table->integer('stock'); // Số lượng tồn kho
            $table->timestamps();
        });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
