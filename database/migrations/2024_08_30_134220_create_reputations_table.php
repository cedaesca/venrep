<?php

use App\Models\Reputation;
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
        Schema::create('reputations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('given_by')->constrained('users');
            $table->foreignId('given_to')->constrained('users');
            $table->enum('type', [Reputation::TYPES]);
            $table->boolean('recommends_zelle')->default(false);
            $table->boolean('recommends_binance')->default(false);
            $table->boolean('recommends_ves')->default(false);
            $table->boolean('recommends_cash')->default(false);
            $table->boolean('recommends_paypal')->default(false);
            $table->boolean('recommends_others')->default(false);
            $table->timestamps();

            $table->unique(['given_by', 'given_to']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reputations');
    }
};
