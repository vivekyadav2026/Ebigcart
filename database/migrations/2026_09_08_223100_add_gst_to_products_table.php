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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('gst', 5, 2)->default(0)->after('price')->comment('GST Percentage (e.g. 0, 5, 12, 18, 28)');
            $table->string('hsn_code', 20)->nullable()->after('sku')->comment('HSN/SAC Code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['gst', 'hsn_code']);
        });
    }
};
