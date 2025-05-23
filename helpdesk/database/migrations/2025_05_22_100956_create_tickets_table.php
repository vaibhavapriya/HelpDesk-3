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
        Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->enum('priority', ['low', 'medium', 'high']);
        $table->string('filetype')->nullable();
        $table->string('filelink')->nullable();
        $table->enum('status', ['open', 'closed'])->default('open');
        $table->string('department');
        //$table->string('requester');
        //$table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('requester_id')->constrained('users')->onDelete('cascade');
        $table->timestamp('last_reply')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
