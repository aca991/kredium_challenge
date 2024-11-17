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
        Schema::create('home_loans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->decimal('value');
            $table->decimal('down_payment_amount');
            $table->unsignedBigInteger('user_id')
                ->index('home_loans_user_id_foreign_idx');
            $table->unsignedBigInteger('client_id')
                ->index('home_loans_client_id_foreign_idx')
                ->unique();

            $table->foreign('user_id', 'home_loans_user_id_foreign')->references('id')->on('users');
            $table->foreign('client_id', 'home_loans_client_id_foreign')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_loans');
    }
};
