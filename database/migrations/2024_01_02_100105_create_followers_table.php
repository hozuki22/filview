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
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->integer('follower_id');
            $table->integer('followed_id');
            $table->timestamps();
            $table->boolean('followflag')->default(1);
            $table->softDeletes()->nullable();

            $table->foreign('follower_id')->references('user_name')->on('users');
            $table->foreign('followed_id')->references('user_name')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');

        $table->dropForeign(['followed_id']);
        $table->dropForeign(['follower_id']);

        $table->dropColumn('followed_id');
        $table->dropColumn('follower_id');
        
    }
};
