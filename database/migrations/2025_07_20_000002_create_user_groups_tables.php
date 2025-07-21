<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('user_group_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_group_id')->constrained('user_groups')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['user_id', 'user_group_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_group_members');
        Schema::dropIfExists('user_groups');
    }
};
