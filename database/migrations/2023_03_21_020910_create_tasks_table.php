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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->integer("type");
            $table->integer("status");
            $table->date("start_date");
            $table->date("due_date");
            $table->unsignedBigInteger("assignee");
            $table->foreign("assignee")->references("id")->on("users");
            $table->date("estimate");
            $table->double("actual");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
