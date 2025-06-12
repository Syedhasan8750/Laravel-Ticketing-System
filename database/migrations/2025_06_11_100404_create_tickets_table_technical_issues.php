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
        Schema::connection('technical_issues')->create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_type');
            $table->string('subject');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('technical_issues')->dropIfExists('tickets');
    }
};
