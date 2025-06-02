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
    Schema::create('buildings', function (Blueprint $table) {
      $table->id();
      $table->string('slug')->unique();
      $table->string('title');
      $table->string('short_title');
      $table->decimal('lat', 12, 8);
      $table->decimal('long', 12, 8);
      $table->string('maps');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('buildings');
  }
};
