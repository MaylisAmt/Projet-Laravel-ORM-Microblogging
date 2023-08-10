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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('picture');
            $table->text('content');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('linked_wotd_id');

            $table->timestamps();

            //clé étrangère table user pour lier le post à l'user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('linked_wotd_id')->references('id')->on('wotds')->onDelete('cascade');


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
