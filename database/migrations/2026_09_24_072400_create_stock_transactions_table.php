<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Header transaksi barang masuk / keluar
        Schema::create('stock_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no', 50)->unique();
            $table->string('type', 10)->index();                 // in | out
            $table->string('status', 15)->default('pending')->index(); // pending | confirmed | cancelled
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->nullOnDelete(); // untuk barang masuk
            $table->string('reason', 30)->nullable();            // untuk barang keluar: sale | return | damaged | other
            $table->date('transaction_date');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->constrained('users')->restrictOnDelete();
            $table->foreignId('confirmed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_transactions');
    }
};
