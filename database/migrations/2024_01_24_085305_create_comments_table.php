<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // database/migrations/xxxx_xx_xx_create_comments_table.php

public function up()
{
    Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('commentable_id')->constrained('posts')->cascadeOnDelete()->cascadeOnUpdate();
        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
        $table->text('body');
        $table->string('commentable_type');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
