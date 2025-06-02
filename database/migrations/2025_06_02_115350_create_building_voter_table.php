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
    Schema::create('building_voter', function (Blueprint $table) {
      $table->id();
      $table->foreignId('building_id')->constrained()->onDelete('cascade');
      $table->foreignId('voter_id')->constrained()->onDelete('cascade');
      $table->timestamp('voted_at')->useCurrent();
      $table->unique(['building_id', 'voter_id']);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('building_voter');
  }
};
