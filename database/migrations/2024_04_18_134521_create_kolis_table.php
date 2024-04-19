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

        Schema::create('kolis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Package::class);
            $table->unsignedInteger('weight')->comment('Berat (KG)');
            $table->unsignedInteger('length')->nullable()->comment('Panjang (CM)');
            $table->unsignedInteger('width')->nullable()->comment('Lebar (CM)');
            $table->unsignedInteger('height')->nullable()->comment('Tinggi (CM)');
            $table->string('description')->nullable()->comment('e.g Pakaian');
            $table->string('surcharge')->nullable()->comment('Asuransi');
            $table->unsignedBigInteger('goods_value')->nullable()->comment('Nilai Barang');
            $table->unsignedInteger('amount')->comment('Jumlah barang');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kolis');
    }
};
