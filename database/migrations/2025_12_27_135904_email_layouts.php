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
        Schema::create('email_layouts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Default Layout
            $table->longText('header_html')->nullable();
            $table->longText('footer_html')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');                // Invoice Created
            $table->string('subject');
            $table->longText('body_html');          // Main content
            $table->json('variables')->nullable();  // ["invoice_no","amount"]
            $table->foreignId('email_layout_id')->nullable()->constrained();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_layouts');
        Schema::dropIfExists('email_templates');
        
         
    }
};
