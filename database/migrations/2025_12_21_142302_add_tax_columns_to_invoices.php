<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->decimal('sub_total', 10, 2)->after('invoice_number');
            $table->decimal('tax_total', 10, 2)->default(0);
            $table->decimal('grand_total', 10, 2)->after('tax_total');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn(['sub_total', 'tax_total', 'grand_total']);
        });
    }
};
