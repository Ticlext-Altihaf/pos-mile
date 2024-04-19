<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new /**/class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Payment::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete();
            $table->string('sender_name')->nullable();
            $table->string('sender_province');
            $table->string('sender_city_or_regency');
            $table->string('sender_address')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('sender_postal_code')->nullable();
            $table->string('receiver_name');
            $table->string('receiver_address');
            $table->string('receiver_phone');
            $table->string('receiver_province');
            $table->string('receiver_city_or_regency');
            $table->string('receiver_district');
            $table->string('receiver_village_or_subdistrict');
            $table->string('receiver_postal_code');
            $table->string('service_level');
            $table->string('package_type');
            $table->string('cod');
            $table->string('reference_number')->nullable();
            $table->string('instructions')->nullable();

            // auto generated
            $table->string('airway_bill');
            $table->unsignedInteger('actual_weight');
            $table->unsignedInteger('volume_weight');
            $table->unsignedInteger('chargeable_weight');
            $table->unsignedInteger('shipment_cost');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
