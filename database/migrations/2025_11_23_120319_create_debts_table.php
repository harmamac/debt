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
    Schema::create('debts', function (Blueprint $table) {
        $table->id();
        $table->string('person_name');
        $table->decimal('amount', 10, 2);
        $table->enum('type', ['owed_by_me', 'owed_to_me']); // مدين لهم أو مدينين لي
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debts');
    }
};
