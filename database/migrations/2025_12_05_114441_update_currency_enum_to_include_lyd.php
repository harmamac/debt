<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    // Update debts table
    DB::statement("ALTER TABLE debts MODIFY COLUMN currency ENUM('RUB', 'USDT', 'LYD') NOT NULL DEFAULT 'RUB'");
    
    // Update expenses table
    DB::statement("ALTER TABLE expenses MODIFY COLUMN currency ENUM('RUB', 'USDT', 'LYD') NOT NULL DEFAULT 'RUB'");
    
    // Update safekeeping table
    DB::statement("ALTER TABLE safekeeping MODIFY COLUMN currency ENUM('RUB', 'USDT', 'LYD') NOT NULL DEFAULT 'RUB'");
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    // Revert back to only RUB and USDT
    DB::statement("ALTER TABLE debts MODIFY COLUMN currency ENUM('RUB', 'USDT') NOT NULL DEFAULT 'RUB'");
    DB::statement("ALTER TABLE expenses MODIFY COLUMN currency ENUM('RUB', 'USDT') NOT NULL DEFAULT 'RUB'");
    DB::statement("ALTER TABLE safekeeping MODIFY COLUMN currency ENUM('RUB', 'USDT') NOT NULL DEFAULT 'RUB'");
}
};
