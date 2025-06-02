<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BuildingSeeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      UserSeeder::class,
      BuildingSeeder::class,
      VoterSeeder::class,
      VoteSeeder::class,
      CommentSeeder::class,
    ]);
  }
}
